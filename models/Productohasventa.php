<?php


class ProductoHasVenta {
    private $conn;

    public function __construct($db) {
        $this->conn = $db; // Aquí $db es una instancia de MySQLi
    }

    public function getAll() {
        $query = "SELECT * FROM producto_has_venta";
        $result = $this->conn->query($query);

        // Inicializar un array para almacenar los resultados
        $resultados = [];

        // Usar fetch_assoc() dentro de un bucle while
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row; // Agregar cada fila al array de resultados
        }

        return $resultados; // Retornar el array de resultados
    }

    // Otros métodos para insertar, actualizar y eliminar


    public function getById($idproducto, $idventa) {
        // Define la consulta SQL
        $query = "SELECT * FROM producto_has_venta WHERE idproducto = ? AND idventa = ?";
        
        // Prepara la declaración
        $stmt = $this->conn->prepare($query);
        
        // Enlaza los parámetros
        $stmt->bind_param("ii", $idproducto, $idventa); // Asumiendo que ambos son enteros (int)
        
        // Ejecuta la consulta
        $stmt->execute();
        
        // Obtiene el resultado
        $result = $stmt->get_result();
        
        // Recupera una fila como un array asociativo
        return $result->fetch_assoc(); // Devuelve el primer registro encontrado
    }
    

    public function create($idproducto, $idventa, $cantidad, $precio_unitario) {
        $query = "INSERT INTO producto_has_venta (idproducto, idventa, cantidad, precio_unitario) VALUES (:idproducto, :idventa, :cantidad, :precio_unitario)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idproducto', $idproducto);
        $stmt->bindParam(':idventa', $idventa);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio_unitario', $precio_unitario);
        $stmt->execute();
    }

    public function update($idproducto, $idventa, $cantidad, $precio_unitario) {
        $query = "UPDATE producto_has_venta SET cantidad = :cantidad, precio_unitario = :precio_unitario WHERE idproducto = :idproducto AND idventa = :idventa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idproducto', $idproducto);
        $stmt->bindParam(':idventa', $idventa);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio_unitario', $precio_unitario);
        $stmt->execute();
    }

    public function delete($idproducto, $idventa) {
        $query = "DELETE FROM producto_has_venta WHERE idproducto = :idproducto AND idventa = :idventa";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idproducto', $idproducto);
        $stmt->bindParam(':idventa', $idventa);
        $stmt->execute();
    }
}
?>
