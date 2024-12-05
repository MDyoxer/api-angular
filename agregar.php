<?php

// Asegúrate de que las cabeceras CORS estén presentes antes de cualquier salida
header("Access-Control-Allow-Origin: *"); // Permitir todas las orígenes, o reemplazar "*" por tu dominio específico
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeceras per

require_once 'includes/api-client.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_GET['email']) && isset($_GET['contra'])){
        Client::create_client($_GET['email'],$_GET['contra']);
    }
?>
    