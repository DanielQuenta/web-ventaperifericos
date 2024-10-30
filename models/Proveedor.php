<?php
class Proveedor {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProveedores() {
        $stmt = $this->db->prepare("SELECT * FROM proveedor");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getProveedorById($id) {
        $stmt = $this->db->prepare("SELECT * FROM proveedor WHERE idproveedor = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createProveedor($nombre, $telefono, $email, $direccion) {
        $stmt = $this->db->prepare("INSERT INTO proveedor (nombre, telefono, email, direccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $telefono, $email, $direccion);
        return $stmt->execute();
    }

    public function updateProveedor($id, $nombre, $telefono, $email, $direccion) {
        $stmt = $this->db->prepare("UPDATE proveedor SET nombre = ?, telefono = ?, email = ?, direccion = ? WHERE idproveedor = ?");
        $stmt->bind_param("ssssi", $nombre, $telefono, $email, $direccion, $id);
        return $stmt->execute();
    }

    public function deleteProveedor($id) {
        $stmt = $this->db->prepare("DELETE FROM proveedor WHERE idproveedor = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
