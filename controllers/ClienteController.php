<?php
/*session_start();
require_once "../models/Database.php";
require_once "../models/Cliente.php";

class ClienteController {
    private $clienteModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->clienteModel = new Cliente($db);
    }

    public function index() {
        $clientes = $this->clienteModel->getAllClientes();
        include "../views/cliente/index.php";
    }

    public function show($id) {
        $cliente = $this->clienteModel->getClienteById($id);
        include "../views/cliente/show.php";
    }

    public function create() {
        include "../views/cliente/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $fecha_registro = $_POST['fecha_registro'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->clienteModel->createCliente($nombre, $apellido, $email, $telefono, $direccion, $fecha_registro, $username, $password);

            header("Location: ../views/welcome2.php");

        }
    }

    public function edit($id) {
        $cliente = $this->clienteModel->getClienteById($id);
        include "../views/cliente/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $fecha_registro = $_POST['fecha_registro'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->clienteModel->updateCliente($id, $nombre, $apellido, $email, $telefono, $direccion, $fecha_registro, $username, $password);
            header("Location: ClienteController.php?action=index");
        }
    }

    public function delete($id) {
        $this->clienteModel->deleteCliente($id);
        header("Location: ClienteController.php?action=index");
    }
}

$controller = new ClienteController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($id);
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>*/
