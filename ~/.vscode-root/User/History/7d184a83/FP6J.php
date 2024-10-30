<?php
class MetodoPago {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllMetodosPago() {
        $stmt = $this->db->prepare("SELECT * FROM metodos_pago");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getMetodoPagoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM metodos_pago WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createMetodoPago($tipo, $detalles) {
        $stmt = $this->db->prepare("INSERT INTO metodos_pago (tipo, detalles) VALUES (?, ?)");
        $stmt->bind_param("ss", $tipo, $detalles);
        return $stmt->execute();
    }

    public function updateMetodoPago($id, $tipo, $detalles) {
        $stmt = $this->db->prepare("UPDATE metodos_pago SET tipo = ?, detalles = ? WHERE id = ?");
        $stmt->bind_param("ssi", $tipo, $detalles, $id);
        return $stmt->execute();
    }

    public function deleteMetodoPago($id) {
        $stmt = $this->db->prepare("DELETE FROM metodos_pago WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
