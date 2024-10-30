<?php
session_start();
require_once "../models/Database.php";
require_once "../models/MetodoPago.php";

class MetodoPagoController {
    private $metodoPagoModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->metodoPagoModel = new MetodoPago($db);
    }

    public function index() {
        $metodos_pago = $this->metodoPagoModel->getAllMetodosPago();
        include "../views/metodos_pago/index.php";
    }

    public function show($id) {
        $metodo_pago = $this->metodoPagoModel->getMetodoPagoById($id);
        include "../views/metodos_pago/show.php";
    }

    public function create() {
        include "../views/metodos_pago/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tipo = $_POST['tipo'];
            $detalles = $_POST['detalles'];
            $this->metodoPagoModel->createMetodoPago($tipo, $detalles);
            header("Location: MetodoPagoController.php?action=index");
        }
    }

    public function edit($id) {
        $metodo_pago = $this->metodoPagoModel->getMetodoPagoById($id);
        include "../views/metodos_pago/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tipo = $_POST['tipo'];
            $detalles = $_POST['detalles'];
            $this->metodoPagoModel->updateMetodoPago($id, $tipo, $detalles);
            header("Location: MetodoPagoController.php?action=index");
        }
    }

    public function delete($id) {
        $this->metodoPagoModel->deleteMetodoPago($id);
        header("Location: MetodoPagoController.php?action=index");
    }
}

$controller = new MetodoPagoController();
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
