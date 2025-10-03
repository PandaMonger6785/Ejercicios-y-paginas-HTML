<?php
require_once "../controladores/control-de-productos.php";

$controlador = new ControladorProducto($db);
$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);


// Dependiendo del método, llama al método correspondiente
if($method == 'GET') {
    $controlador->obtenerTodos();
} elseif($method == 'POST') {
    $controlador->crear($data);
} elseif($method == 'PUT') {
    $controlador->actualizar($data);
} elseif($method == 'DELETE') {
    $controlador->eliminar($data);
} else {
    echo json_encode(["message" => "Método no soportado"]);
}
?>
