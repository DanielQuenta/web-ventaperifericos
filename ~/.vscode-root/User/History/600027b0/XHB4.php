<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Mercancia.php";

class MercanciaController {
    private $mercanciaModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->mercanciaModel = new Mercancia($db);
    }

    public function index() {
        $mercancias = $this->mercanciaModel->getAllMercancias();
        include "../views/mercancias/index.php";
    }

    public function show($id) {
        $mercancia = $this->mercanciaModel->getMercanciaById($id);
        include "../views/mercancias/show.php";
    }

    public function create() {
        include "../views/mercancias/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcion = $_POST['descripcion'];
            $this->mercanciaModel->createMercancia($descripcion);
            header("Location: MercanciaController.php?action=index");
        }
    }

    public function edit($id) {
        $mercancia = $this->mercanciaModel->getMercanciaById($id);
        include "../views/mercancias/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcion = $_POST['descripcion'];
            $this->mercanciaModel->updateMercancia($id, $descripcion);
            header("Location: MercanciaController.php?action=index");
        }
    }

    public function delete($id) {
        $this->mercanciaModel->deleteMercancia($id);
        header("Location: MercanciaController.php?action=index");
    }
}

$controller = new MercanciaController();
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
