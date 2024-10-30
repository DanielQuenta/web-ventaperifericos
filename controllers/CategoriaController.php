<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Categoria.php";

class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->categoriaModel = new Categoria($db);
    }

    public function index() {
        $categorias = $this->categoriaModel->getAllCategorias();
        include "../views/categoria/index.php";
    }

    public function show($id) {
        $categoria = $this->categoriaModel->getCategoriaById($id);
        include "../views/categoria/show.php";
    }

    public function create() {
        include "../views/categoria/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_categoria = $_POST['nombre_categoria'];

            $this->categoriaModel->createCategoria($nombre_categoria);
            header("Location: CategoriaController.php?action=index");
        }
    }

    public function edit($id) {
        $categoria = $this->categoriaModel->getCategoriaById($id);
        include "../views/categoria/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_categoria = $_POST['nombre_categoria'];

            $this->categoriaModel->updateCategoria($id, $nombre_categoria);
            header("Location: CategoriaController.php?action=index");
        }
    }

    public function delete($id) {
        $this->categoriaModel->deleteCategoria($id);
        header("Location: CategoriaController.php?action=index");
    }
}

$controller = new CategoriaController();
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
