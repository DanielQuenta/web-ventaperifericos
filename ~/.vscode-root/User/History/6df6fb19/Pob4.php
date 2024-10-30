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
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tipo = $_POST['tipo'];
            $this->usuarioModel->createUsuario($username, $password, $tipo);
            header("Location: UsuarioController.php?action=index");
        }
    }

    public function edit($id) {
        $usuario = $this->usuarioModel->getUsuarioById($id);
        include "../views/usuarios/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tipo = $_POST['tipo'];
            $this->usuarioModel->updateUsuario($id, $username, $password, $tipo);
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
?>

