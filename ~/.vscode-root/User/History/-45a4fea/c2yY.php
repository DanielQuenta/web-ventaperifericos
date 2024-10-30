<?php
class Usuario {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsuario($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
        
        // Depuración: Verificar si la preparación del statement fue exitosa
        if (!$stmt) {
            echo "Error en la preparación de la consulta: " . $this->db->error . "<br>";
            return null;
        }
        
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Depuración: Verificar si la ejecución de la consulta fue exitosa
        if (!$result) {
            echo "Error en la ejecución de la consulta: " . $stmt->error . "<br>";
            return null;
        }
        
        return $result->fetch_assoc();
    }

    public function createUsuario($username, $password, $tipo) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (username, password, tipo) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $tipo);
        return $stmt->execute();
    }

    public function updateUsuario($id, $username, $password, $tipo) {
        $stmt = $this->db->prepare("UPDATE usuarios SET username = ?, password = ?, tipo = ? WHERE id = ?");
        $stmt->bind_param("sssi", $username, $password, $tipo, $id);
        return $stmt->execute();
    }

    public function deleteUsuario($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>





