<?php
class Producto {
    private $conn;
    private $table_name = "products";

    public $id;
    public $nombre;
    public $precio;

    public function __construct($db){
        $this->conn = $db;
    }


    // Método para leer los productos de la tabla
    public function leerTodos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);   // Prepara la consulta
        $stmt->execute();
        return $stmt;  // Devuelve el resultado
    }

    // Método para crear un nuevo producto
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, precio=:precio";
        $stmt = $this->conn->prepare($query);  // Prepara la consulta
        $stmt->bindParam(":nombre", $this->nombre);  // Asocia el nombre
        $stmt->bindParam(":precio", $this->precio);  // Asocia el precio
        return $stmt->execute();
    }


    // Método para actualizar un producto
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, precio=:precio WHERE id=:id";
        $stmt = $this->conn->prepare($query);  // Prepara la consulta
        $stmt->bindParam(":nombre", $this->nombre);  // Asocia el nombre

        $stmt->bindParam(":precio", $this->precio); // Asocia el precio
        $stmt->bindParam(":id", $this->id);  // Asocia el id
        return $stmt->execute();
    }


    // Método para eliminar un producto
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);  // Prepara la consulta
        $stmt->bindParam(":id", $this->id);  // Asocia el id
        return $stmt->execute();
    }
}
?>
