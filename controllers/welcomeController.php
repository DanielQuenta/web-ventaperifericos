<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Welcome.php";

class WelcomeController {
    private $welcomeModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->welcomeModel = new Welcome($db);
    }

    // Muestra todos los mensajes de bienvenida
    public function index() {
        $messages = $this->welcomeModel->getAllMessages();
        include "../views/welcome.php";
    }

    // Muestra un mensaje específico por su ID
    public function show($id) {
        $message = $this->welcomeModel->getMessageById($id);
        include "../views/welcome/show.php";
    }

    // Muestra la vista para crear un nuevo mensaje
    public function create() {
        include "../views/welcome/create.php";
    }

    // Guarda un nuevo mensaje de bienvenida
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $message = $_POST['message'];
            $author = $_POST['author'];
            $date = $_POST['date'];
            $this->welcomeModel->createMessage($title, $message, $author, $date);
            header("Location: WelcomeController.php?action=index");
        }
    }

    // Muestra la vista para editar un mensaje existente
    public function edit($id) {
        $message = $this->welcomeModel->getMessageById($id);
        include "../views/welcome/edit.php";
    }

    // Actualiza un mensaje de bienvenida existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $message = $_POST['message'];
            $author = $_POST['author'];
            $date = $_POST['date'];
            $this->welcomeModel->updateMessage($id, $title, $message, $author, $date);
            header("Location: WelcomeController.php?action=index");
        }
    }

    // Elimina un mensaje de bienvenida
    public function delete($id) {
        $this->welcomeModel->deleteMessage($id);
        header("Location: WelcomeController.php?action=index");
    }
}

// Instancia del controlador y manejo de acciones
$controller = new WelcomeController();
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
