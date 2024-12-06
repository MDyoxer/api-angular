<?php


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
