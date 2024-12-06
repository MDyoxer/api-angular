<?php


require_once 'includes/api-client.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        Client::show_clients();
    }
?>
    