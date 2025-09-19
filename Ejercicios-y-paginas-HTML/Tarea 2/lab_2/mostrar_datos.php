<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
 die("Conexión fallida: " . $conn->connect_error);
}
// Consultar datos
$sql = "SELECT id, nombre, email, edad FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 echo "<h1>Usuarios Registrados</h1>";
 echo "<table border='1'>";
 echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Edad</th></tr>";
 while($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["nombre"] . "</td>";
 echo "<td>" . $row["email"] . "</td>";
 echo "<td>" . $row["edad"] . "</td>";
 echo "</tr>";
 }
 echo "</table>";
} else {
 echo "No hay usuarios registrados.";
}
// Cerrar la conexión
$conn->close();
?>