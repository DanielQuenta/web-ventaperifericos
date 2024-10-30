<?php
class Usuario {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllUsuarios() {
        $stmt = $this->db->prepare("SELECT * FROM cliente");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsuario($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE username = ? AND password = ?");
        
        // Depuración: Verificar si la preparación del statement fue exitosa
        if (!$stmt) {
            echo "Error en la preparación de la consulta: " . $this->db->error . "<br>";
            return null;
        }
        
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Depuración: Verificar si la ejecución de la consulta fue exitosa
        if (!$result) {
            echo "Error en la ejecución de la consulta: " . $stmt->error . "<br>";
            return null;
        }
        
        return $result->fetch_assoc();
    }

    public function getEmpleado($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM empleado WHERE username = ? AND password = ?");
        
        // Depuración: Verificar si la preparación del statement fue exitosa
        if (!$stmt) {
            echo "Error en la preparación de la consulta: " . $this->db->error . "<br>";
            return null;
        }
        
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Depuración: Verificar si la ejecución de la consulta fue exitosa
        if (!$result) {
            echo "Error en la ejecución de la consulta: " . $stmt->error . "<br>";
            return null;
        }
        
        return $result->fetch_assoc();
    }

    public function getUsuarioById($id) {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE idcliente = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createCliente($nombre, $apellido, $email, $telefono, $direccion, $username, $password) {
        // Guardar la contraseña en texto plano (no recomendado en producción)
        $stmt = $this->db->prepare("INSERT INTO cliente (nombre, apellido, email, telefono, direccion, username, password, fecha_registro) VALUES (?, ?, ?, ?, ?, ?, ?, CURDATE())");
        $stmt->bind_param("sssssss", $nombre, $apellido, $email, $telefono, $direccion, $username, $password);
        return $stmt->execute();
    }

    public function updateCliente($id, $nombre, $apellido, $email, $telefono, $direccion, $username, $password) {
        // Guardar la contraseña en texto plano (no recomendado en producción)
        $sql = "UPDATE cliente SET nombre = ?, apellido = ?, email = ?, telefono = ?, direccion = ?, username = ?, password = ? WHERE idcliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssssi", $nombre, $apellido, $email, $telefono, $direccion, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteUsuario($id) {
        $stmt = $this->db->prepare("DELETE FROM cliente WHERE idcliente = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
