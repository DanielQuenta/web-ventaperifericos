<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Productohasventa.php";

class ProductoHasVentaController {
    private $productoHasVentaModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->productoHasVentaModel = new ProductoHasVenta($db);
    }

    public function index() {
        // Obtener todos los productos en venta
        $productos_ventas = $this->productoHasVentaModel->getAll(); // Asegúrate de que este método retorne datos.
        include "../views/producto_has_venta/index.php"; // Pasa la variable a la vista
    }


    public function show($idproducto, $idventa) {
        $producto_venta = $this->productoHasVentaModel->getById($idproducto, $idventa);
        include "../views/producto_has_venta/show.php";
    }

    public function create() {
        include "../views/producto_has_venta/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idproducto = $_POST['idproducto'];
            $idventa = $_POST['idventa'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];

            $this->productoHasVentaModel->create($idproducto, $idventa, $cantidad, $precio_unitario);
            header("Location: ProductoHasVentaController.php?action=index");
            exit();
        }
    }

    public function edit($idproducto, $idventa) {
        $producto_venta = $this->productoHasVentaModel->getById($idproducto, $idventa);
        include "../views/producto_has_venta/edit.php";
    }

    public function update($idproducto, $idventa) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];

            $this->productoHasVentaModel->update($idproducto, $idventa, $cantidad, $precio_unitario);
            header("Location: ProductohasventaController.php?action=index");
            exit();
        }
    }

    public function delete($idproducto, $idventa) {
        $this->productoHasVentaModel->delete($idproducto, $idventa);
        header("Location: ProductohasventaController.php?action=index");
    }
}

$controller = new ProductoHasVentaController();
$action = $_GET['action'] ?? 'index';
$idproducto = $_GET['idproducto'] ?? null;
$idventa = $_GET['idventa'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($idproducto, $idventa);
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($idproducto, $idventa);
        break;
    case 'update':
        $controller->update($idproducto, $idventa);
        break;
    case 'delete':
        $controller->delete($idproducto, $idventa);
        break;
    default:
        $controller->index();
        break;
}
?>
