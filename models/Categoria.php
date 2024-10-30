<?php
class Categoria {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCategorias() {
        $stmt = $this->db->prepare("SELECT * FROM categoria");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoriaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM categoria WHERE idcategoria = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createCategoria($nombre_categoria) {
        $stmt = $this->db->prepare("INSERT INTO categoria (nombre_categoria) VALUES (?)");
        $stmt->bind_param("s", $nombre_categoria);
        return $stmt->execute();
    }

    public function updateCategoria($id, $nombre_categoria) {
        $stmt = $this->db->prepare("UPDATE categoria SET nombre_categoria = ? WHERE idcategoria = ?");
        $stmt->bind_param("si", $nombre_categoria, $id);
        return $stmt->execute();
    }

    public function deleteCategoria($id) {
        $stmt = $this->db->prepare("DELETE FROM categoria WHERE idcategoria = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
