<?php
// Asegúrate de que las cabeceras CORS estén presentes antes de cualquier salida
header("Access-Control-Allow-Origin: *"); // Permitir todas las orígenes, o reemplazar "*" por tu dominio específico
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeceras per

class Database {
    private $host = 'localhost';
    private $db = 'angular';
    private $user = 'root';
    private $pass = '';
    private $pdo;

    public function getConnection() {
        if ($this->pdo === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        return $this->pdo;
    }
}
?>
