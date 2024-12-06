

<?php 



require_once __DIR__ . '/../conn/conn.php';

class Client {
    // Método para crear cliente
    public static function create_client($email, $contra) {
        $database = new Database();
        $pdo = $database->getConnection();

        try {
            $stmt = $pdo->prepare('INSERT INTO registro (email, contra) VALUES (:email, :contra)');
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contra', $contra);

            if ($stmt->execute()) {
                header('HTTP/1.1 201 Cliente enviado correctamente');
                echo json_encode(['message' => 'Cliente enviado correctamente']);
            } else {
                header('HTTP/1.1 400 Cliente no se ha creado correctamente');
                echo json_encode(['message' => 'Cliente no se ha creado correctamente']);
            }
        } catch (PDOException $e) {
            header('HTTP/1.1 500 Error interno del servidor');
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar cliente
    public static function delete_client($id) {
        $database = new Database();
        $pdo = $database->getConnection();

        try {
            $stmt = $pdo->prepare('DELETE FROM registro WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header('HTTP/1.1 200 Cliente eliminado correctamente');
                echo json_encode(['message' => 'Cliente borrado correctamente']);
            } else {
                header('HTTP/1.1 400 Cliente no se ha borrado correctamente');
                echo json_encode(['message' => 'Cliente no se ha borrado correctamente']);
            }
        } catch (PDOException $e) {
            header('HTTP/1.1 500 Error interno del servidor');
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

        // Método para actualizar cliente
        public static function update_client($id,$email,$contra) {
            $database = new Database();
            $pdo = $database->getConnection();
    
            try {
                $stmt = $pdo->prepare('UPDATE registro SET email=:email,contra=:contra WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':contra', $contra);
    
                if ($stmt->execute()) {
                    header('HTTP/1.1 200 Cliente Actualizado correctamente');
                    echo json_encode(['message' => 'Cliente actualizado correctamente']);
                } else {
                    header('HTTP/1.1 400 Cliente no se ha actualizado correctamente');
                    echo json_encode(['message' => 'Cliente no se ha actualizado correctamente']);
                }
            } catch (PDOException $e) {
                header('HTTP/1.1 500 Error interno del servidor');
                echo json_encode(['error' => $e->getMessage()]);
            }
        }

        public static function show_clients(){
            $database = new Database();
            $pdo = $database->getConnection();

            $stmt = $pdo->prepare('SELECT * FROM registro');
            
            if ($stmt->execute()) {
                $result = $stmt->fetchAll();
                header('HTTP/1.1 200 Cliente mostrados correctamente');
                echo json_encode(['message' => 'Cliente mostrados correctamente']);
            } else {
                header('HTTP/1.1 400 Cliente no se han podido consultar correctamente');
                echo json_encode(['message' => 'Cliente no se ha consultado correctamente']);
            }
        }
}
?>
