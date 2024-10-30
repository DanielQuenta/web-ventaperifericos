<?php
class Venta {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllVentas() {
        $stmt = $this->db->prepare("SELECT * FROM venta");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Devuelve un array asociativo
    }

    public function getVentaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM venta WHERE idventa = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createVenta($idcliente, $fecha_venta, $total, $metodo_pago, $imagen_url) {
        // Preparar la consulta SQL para insertar en la tabla venta
        $stmt = $this->db->prepare("INSERT INTO venta (idcliente, fecha_venta, total, metodo_pago, imagen_url) VALUES (?, ?, ?, ?, ?)");
        
        // Vincular parámetros. El orden de los tipos debe coincidir con el orden de los parámetros en la consulta
        $stmt->bind_param("isdss", $idcliente, $fecha_venta, $total, $metodo_pago, $imagen_url);
        
        // Ejecutar la consulta y retornar el resultado
        return $stmt->execute();
    }
    

    public function updateVenta($id, $idcliente, $fecha_venta, $total, $metodo_pago, $imagen_url) {
        // Primero, obtenemos la venta existente para conservar la imagen actual si no se proporciona una nueva
        $ventaExistente = $this->getVentaById($id);
    
        // Verificamos si se ha proporcionado una nueva imagen, de lo contrario, mantenemos la existente
        if (empty($imagen_url)) {
            $imagen_url = $ventaExistente['imagen_url']; // Mantener la imagen existente
        }
    
        // Preparamos la consulta para actualizar los datos de la venta
        $stmt = $this->db->prepare("UPDATE venta SET idcliente = ?, fecha_venta = ?, total = ?, metodo_pago = ?, imagen_url = ? WHERE idventa = ?");
        
        // Enlazamos los parámetros a la consulta
        $stmt->bind_param("issssi", $idcliente, $fecha_venta, $total, $metodo_pago, $imagen_url, $id);
        
        // Ejecutamos la consulta y retornamos el resultado
        return $stmt->execute();
    }
    
    
    public function deleteVenta($id) {
        $stmt = $this->db->prepare("DELETE FROM venta WHERE idventa = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
