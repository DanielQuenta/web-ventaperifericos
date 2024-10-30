<?php
class Usuario {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsuario($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>

