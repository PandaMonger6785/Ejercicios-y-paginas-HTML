<?php
require_once "../modelos/productos.php";

class ControladorProducto {
    private $db;
    private $producto;

    public function __construct($db) {
        $this->db = $db;
        $this->producto = new Producto($db);
    }


    // Método para obtener los productos
    public function obtenerTodos() {
        $stmt = $this->producto->leerTodos();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($productos);  // Devuelve los productos en formato JSON
    }


    // Método para crear un nuevo producto
    public function crear($data) {
        $this->producto->nombre = $data['nombre'];
        $this->producto->precio = $data['precio'];
        if($this->producto->crear()) {
            echo json_encode(["message" => "Producto creado"]);
        } else {
            echo json_encode(["message" => "Error al crear producto"]);
        }
    }
 
    // Método para actualizar un producto
    public function actualizar($data) {
        $this->producto->id = $data['id'];
        $this->producto->nombre = $data['nombre'];  // Actualiza el nombre
        $this->producto->precio = $data['precio'];
        if($this->producto->actualizar()) {
            echo json_encode(["message" => "Producto actualizado"]);  // Mensaje de éxito
        } else {
            echo json_encode(["message" => "Error al actualizar producto"]);  // Mensaje de error
        }
    }

    // Método para eliminar un producto
    public function eliminar($data) {
        $this->producto->id = $data['id'];
        if($this->producto->eliminar()) {  // Llama al método eliminar
            echo json_encode(["message" => "Producto eliminado"]); // Mensaje de éxito
        } else {
            echo json_encode(["message" => "Error al eliminar producto"]);  // Mensaje de error
        }
    }
}
?>
