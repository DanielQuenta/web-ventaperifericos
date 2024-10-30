<?php
class Prenda {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllPrendas() {
        $stmt = $this->db->prepare("SELECT * FROM prendas");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPrendaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM prendas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createPrenda($descripcion, $precio, $cantidad, $estado) {
        $stmt = $this->db->prepare("INSERT INTO prendas (descripcion, precio, cantidad, estado) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdis", $descripcion, $precio, $cantidad, $estado);
        return $stmt->execute();
    }

    public function updatePrenda($id, $descripcion, $precio, $cantidad, $estado) {
        $stmt = $this->db->prepare("UPDATE prendas SET descripcion = ?, precio = ?, cantidad = ?, estado = ? WHERE id = ?");
        $stmt->bind_param("sdisi", $descripcion, $precio, $cantidad, $estado, $id);
        return $stmt->execute();
    }

    public function deletePrenda($id) {
        $stmt = $this->db->prepare("DELETE FROM prendas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
