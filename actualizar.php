<?php


require_once 'includes/api-client.php';

parse_str(file_get_contents("php://input"), $_PUT);

if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['id']) && isset($_PUT['email']) && isset($_PUT['contra'])) {
    $id = $_GET['id'];
    $email = $_PUT['email'];
    $contra = $_PUT['contra'];

    Client::update_client($id, $email, $contra); 
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['message' => 'ID, email o contraseña no proporcionados o método no válido']);
}
?>