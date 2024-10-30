<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Proveedor.php"; // Asegúrate de tener un modelo para Proveedor

class ProveedorController {
    private $proveedorModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->proveedorModel = new Proveedor($db); // Cambia a Proveedor
    }

    public function index() {
        $proveedores = $this->proveedorModel->getAllProveedores(); // Cambia a getAllProveedores
        include "../views/proveedor/index.php"; // Cambia la vista a proveedor
    }

    public function show($id) {
        $proveedor = $this->proveedorModel->getProveedorById($id); // Cambia a getProveedorById
        include "../views/proveedor/show.php"; // Cambia la vista a proveedor
    }

    public function create() {
        include "../views/proveedor/create.php"; // Cambia la vista a proveedor
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];

            $this->proveedorModel->createProveedor($nombre, $telefono, $email, $direccion); // Cambia a createProveedor
            header("Location: ProveedorController.php?action=index"); // Cambia a ProveedorController
        }
    }

    public function edit($id) {
        $proveedor = $this->proveedorModel->getProveedorById($id); // Cambia a getProveedorById
        include "../views/proveedor/edit.php"; // Cambia la vista a proveedor
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];

            $this->proveedorModel->updateProveedor($id, $nombre, $telefono, $email, $direccion); // Cambia a updateProveedor
            header("Location: ProveedorController.php?action=index"); // Cambia a ProveedorController
        }
    }

    public function delete($id) {
        $this->proveedorModel->deleteProveedor($id); // Cambia a deleteProveedor
        header("Location: ProveedorController.php?action=index"); // Cambia a ProveedorController
    }
}

$controller = new ProveedorController(); // Cambia a ProveedorController
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
