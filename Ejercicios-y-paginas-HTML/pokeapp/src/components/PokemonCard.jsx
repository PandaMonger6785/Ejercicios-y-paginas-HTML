function PokemonCard({ pokemon }) {
  return (
    <div className="pokemon-card">
      <h2>{pokemon.name}</h2>
      <img src={pokemon.sprites.front_default} alt={pokemon.name} />
      <div>
        <p><strong>Altura:</strong> {pokemon.height / 10}m</p>
        <p><strong>Peso:</strong> {pokemon.weight / 10}kg</p>
        <p><strong>Tipo:</strong> {pokemon.types.map(t => t.type.name).join(', ')}</p>
      </div>
    </div>
  );
}

export default PokemonCard;