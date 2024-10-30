<!-- <php/*
class Cliente {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllClientes() {
        $stmt = $this->db->prepare("SELECT * FROM cliente");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteById($id) {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE idcliente = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createCliente($nombre, $apellido, $email, $telefono, $direccion, $fecha_registro, $username, $password) {
        $stmt = $this->db->prepare("INSERT INTO cliente (nombre, apellido, email, telefono, direccion, fecha_registro, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nombre, $apellido, $email, $telefono, $direccion, $fecha_registro, $username, password_hash($password, PASSWORD_BCRYPT));
        return $stmt->execute();
    }

    public function updateCliente($id, $nombre, $apellido, $email, $telefono, $direccion, $fecha_registro, $username, $password) {
        $stmt = $this->db->prepare("UPDATE cliente SET nombre = ?, apellido = ?, email = ?, telefono = ?, direccion = ?, fecha_registro = ?, username = ?, password = ? WHERE idcliente = ?");
        $stmt->bind_param("ssssssssi", $nombre, $apellido, $email, $telefono, $direccion, $fecha_registro, $username, password_hash($password, PASSWORD_BCRYPT), $id);
        return $stmt->execute();
    }

    public function deleteCliente($id) {
        $stmt = $this->db->prepare("DELETE FROM cliente WHERE idcliente = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
*/