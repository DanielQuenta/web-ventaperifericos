<?php
class Mercancia {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllMercancias() {
        $stmt = $this->db->prepare("SELECT * FROM mercancias");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getMercanciaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM mercancias WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createMercancia($descripcion) {
        $stmt = $this->db->prepare("INSERT INTO mercancias (descripcion) VALUES (?)");
        $stmt->bind_param("s", $descripcion);
        return $stmt->execute();
    }

    public function updateMercancia($id, $descripcion) {
        $stmt = $this->db->prepare("UPDATE mercancias SET descripcion = ? WHERE id = ?");
        $stmt->bind_param("si", $descripcion, $id);
        return $stmt->execute();
    }

    public function deleteMercancia($id) {
        $stmt = $this->db->prepare("DELETE FROM mercancias WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
