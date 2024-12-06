<?php


if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    Client::delete_client($id); 
} else {
    header('HTTP/1.1 400 Solicitud inválida');
    echo json_encode(['message' => 'ID no proporcionado o método no válido']);
}
?>
