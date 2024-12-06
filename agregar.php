<?php



require_once 'includes/api-client.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_GET['email']) && isset($_GET['contra'])){
        Client::create_client($_GET['email'],$_GET['contra']);
    }
?>
    