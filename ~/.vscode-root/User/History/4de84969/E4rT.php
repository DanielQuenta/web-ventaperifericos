<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Prenda.php";

class PrendaController {
    private $prendaModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->prendaModel = new Prenda($db);
    }

    public function index() {
        $prendas = $this->prendaModel->getAllPrendas();
        include "../views/prendas/index.php";
    }

    public function show($id) {
        $prenda = $this->prendaModel->getPrendaById($id);
        include "../views/prendas/show.php";
    }

    public function create() {
        include "../views/prendas/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $estado = $_POST['estado'];
            $this->prendaModel->createPrenda($descripcion, $precio, $cantidad, $estado);
            header("Location: PrendaController.php?action=index");
        }
    }

    public function edit($id) {
        $prenda = $this->prendaModel->getPrendaById($id);
        include "../views/prendas/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $estado = $_POST['estado'];
            $this->prendaModel->updatePrenda($id, $descripcion, $precio, $cantidad, $estado);
            header("Location: PrendaController.php?action=index");
        }
    }

    public function delete($id) {
        $this->prendaModel->deletePrenda($id);
        header("Location: PrendaController.php?action=index");
    }
}

$controller = new PrendaController();
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
