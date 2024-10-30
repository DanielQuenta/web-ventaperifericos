<?php
class Usuario {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllUsuarios() {
        $stmt = $this->db->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsuarioById($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
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
