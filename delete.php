<?php

// Asegúrate de que las cabeceras CORS estén presentes antes de cualquier salida
header("Access-Control-Allow-Origin: *"); // Permitir todas las orígenes, o reemplazar "*" por tu dominio específico
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeceras per
require_once 'includes/api-client.php';


if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    Client::delete_client($id); 
} else {
    header('HTTP/1.1 400 Solicitud inválida');
    echo json_encode(['message' => 'ID no proporcionado o método no válido']);
}
?>
