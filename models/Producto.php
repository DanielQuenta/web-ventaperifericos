<?php
class Producto {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllProductos() {
        $stmt = $this->db->prepare("SELECT * FROM producto");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Devuelve un array asociativo
    }
    

    public function getProductoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM producto WHERE idproducto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

public function createProducto($nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $fecha_registro, $image_path) {
    $stmt = $this->db->prepare("INSERT INTO producto (nombre, descripcion, precio, stock, idcategoria, idproveedor, fecha_registro, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiisss", $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $fecha_registro, $image_path);
    return $stmt->execute();
}

/*public function updateProducto($id, $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $image_path) {
    $stmt = $this->db->prepare("UPDATE producto SET nombre = ?, descripcion = ?, precio = ?, stock = ?, idcategoria = ?, idproveedor = ?, image_path = ? WHERE idproducto = ?");
    $stmt->bind_param("ssdiiisi", $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $image_path, $id);
    return $stmt->execute();
}*/

public function updateProducto($id, $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $image_path) {
    // Primero, obtenemos el producto existente para conservar la imagen actual si no se proporciona una nueva
    $productoExistente = $this->getProductoById($id);

    // Verificamos si se ha proporcionado una nueva imagen, de lo contrario, mantenemos la existente
    if (empty($image_path)) {
        $image_path = $productoExistente['image_path']; // Mantener la imagen existente
    }

    $stmt = $this->db->prepare("UPDATE producto SET nombre = ?, descripcion = ?, precio = ?, stock = ?, idcategoria = ?, idproveedor = ?, image_path = ? WHERE idproducto = ?");
    $stmt->bind_param("ssdiiisi", $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $image_path, $id);
    return $stmt->execute();
}


    public function deleteProducto($id) {
        $stmt = $this->db->prepare("DELETE FROM producto WHERE idproducto = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    
}
?>
