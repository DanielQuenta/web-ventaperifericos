<?php
class Empleado {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllEmpleados() {
        $stmt = $this->db->prepare("SELECT * FROM empleado");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getEmpleadoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM empleado WHERE idempleado = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createEmpleado($nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $password) {
        $stmt = $this->db->prepare("INSERT INTO empleado (nombre, apellido, email, telefono, cargo, fecha_contratacion, salario, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // Se almacena la contraseña sin hashear
        $stmt->bind_param("sssssssss", $nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $password);
        return $stmt->execute();
    }

    public function updateEmpleado($id, $nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $password) {
        if (!empty($password)) {
            // Se almacena la nueva contraseña sin hashear
            $stmt = $this->db->prepare("UPDATE empleado SET nombre = ?, apellido = ?, email = ?, telefono = ?, cargo = ?, fecha_contratacion = ?, salario = ?, username = ?, password = ? WHERE idempleado = ?");
            $stmt->bind_param("ssssssssdi", $nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $password, $id);
        } else {
            // Si no se proporciona una nueva contraseña, no la actualizamos
            $stmt = $this->db->prepare("UPDATE empleado SET nombre = ?, apellido = ?, email = ?, telefono = ?, cargo = ?, fecha_contratacion = ?, salario = ?, username = ? WHERE idempleado = ?");
            $stmt->bind_param("ssssssssi", $nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $id);
        }
        return $stmt->execute();
    }

    public function deleteEmpleado($id) {
        $stmt = $this->db->prepare("DELETE FROM empleado WHERE idempleado = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
