import { useState, useEffect } from 'react';
import { fetchPokemons } from './services/pokeApi';
import PokemonList from './components/PokemonList';
import SearchBar from './components/SearchBar';
import './styles/styles.css';

function App() {
  const [pokemons, setPokemons] = useState([]);
  const [filteredPokemons, setFilteredPokemons] = useState([]);
  const [loading, setLoading] = useState(true);
  const [searchTerm, setSearchTerm] = useState('');

  useEffect(() => {
    const loadData = async () => {
      const data = await fetchPokemons(50);
      setPokemons(data);
      setFilteredPokemons(data);
      setLoading(false);
    };
    loadData();
  }, []);

  useEffect(() => {
    const filtered = pokemons.filter(pokemon =>
      pokemon.name.toLowerCase().includes(searchTerm.toLowerCase())
    );
    setFilteredPokemons(filtered);
  }, [searchTerm, pokemons]);

  if (loading) return <div>Cargando Pokémon...</div>;

  return (
    <div className="app">
      <h1>Pokédex</h1>
      <SearchBar onSearch={setSearchTerm} />
      <PokemonList pokemons={filteredPokemons} />
    </div>
  );
}

export default App;