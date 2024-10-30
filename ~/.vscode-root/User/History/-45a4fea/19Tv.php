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
}
?>





