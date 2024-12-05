<?php

// Asegúrate de que las cabeceras CORS estén presentes antes de cualquier salida
header("Access-Control-Allow-Origin: *"); // Permitir todas las orígenes, o reemplazar "*" por tu dominio específico
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeceras per
require_once 'includes/api-client.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['id']) && isset($_GET['email']) && isset($_GET['contra'])) {
    $id = $_GET['id'];
    $email = $_GET['email'];
    $contra = $_GET['contra'];

    Client::update_client($id, $email, $contra); 
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['message' => 'ID, email o contraseña no proporcionados o método no válido']);
}
?>
