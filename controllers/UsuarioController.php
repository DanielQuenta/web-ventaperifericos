<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Usuario.php";

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuarioModel = new Usuario($db);
    }

    public function index() {
        $usuarios = $this->usuarioModel->getAllUsuarios();
        include "../views/usuarios/index.php";
    }

    public function show($id) {
        $usuario = $this->usuarioModel->getUsuarioById($id);
        include "../views/usuarios/show.php";
    }

    public function create() {
        include "../views/usuarios/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Capturar los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $username = $_POST['username'];
            $password = $_POST['password']; // No hasheamos la contraseña
    
            // Crear un nuevo cliente en la base de datos
            $this->usuarioModel->createCliente($nombre, $apellido, $email, $telefono, $direccion, $username, $password);
    
            // Redirigir a la acción de índice o a la página correspondiente
            header("Location: UsuarioController.php?action=index");
            exit(); // Asegúrate de salir después de la redirección
        }
    }
   
    public function edit($id) {
        // Obtener datos del cliente a partir del ID proporcionado
        $cliente = $this->usuarioModel->getUsuarioById($id);
        // Cargar la vista de edición del cliente con los datos obtenidos
        include "../views/usuarios/edit.php";
    }
    
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener datos del formulario de edición del cliente
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $username = $_POST['username'];
            $password = $_POST['password']; // No hasheamos la contraseña
    
            // Actualizar el cliente en la base de datos a través del modelo
            $this->usuarioModel->updateCliente($id, $nombre, $apellido, $email, $telefono, $direccion, $username, $password);
    
            // Redirigir a la lista de clientes después de la actualización
            header("Location: UsuarioController.php?action=index");
        }
    }
    
    public function delete($id) {
        $this->usuarioModel->deleteUsuario($id);
        header("Location: UsuarioController.php?action=index");
    }
}

$controller = new UsuarioController();
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
