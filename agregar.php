<?php



require_once 'includes/api-client.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['contra'])) {
    $email = $_POST['email'];
    $contra = $_POST['contra'];
    Client::create_client($email, $contra);
} else {
    header('HTTP/1.1 400 Solicitud inválida');
    echo json_encode(['message' => 'Datos incompletos o método no válido']);
    exit;
}
?>
    