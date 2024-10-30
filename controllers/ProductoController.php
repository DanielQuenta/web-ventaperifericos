<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Producto.php";

class ProductoController {
    private $productoModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->productoModel = new Producto($db);
    }

    public function index() {
        $productos = $this->productoModel->getAllProductos();
        include "../views/producto/index.php";
    }

    public function show($id) {
        $producto = $this->productoModel->getProductoById($id);
        include "../views/producto/show.php";
    }

    public function create() {
        // Aquí podrías cargar categorías y proveedores para mostrarlos en el formulario
        include "../views/producto/create.php";
    }
    /*
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $idcategoria = $_POST['idcategoria'];
            $idproveedor = $_POST['idproveedor'];
            $fecha_registro = date('Y-m-d'); // Establece la fecha de registro a la fecha actual
    
            $this->productoModel->createProducto($nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $fecha_registro);
            header("Location: ProductoController.php?action=index");
        }
    }
    */

    public function edit($id) {
        $producto = $this->productoModel->getProductoById($id);
        // Cargar categorías y proveedores para mostrarlos en el formulario de edición
        include "../views/producto/edit.php";
    }

    /*
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $idcategoria = $_POST['idcategoria'];
            $idproveedor = $_POST['idproveedor'];
            $this->productoModel->updateProducto($id, $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor);
            header("Location: ProductoController.php?action=index");
        }
    }
    */
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $idcategoria = $_POST['idcategoria'];
            $idproveedor = $_POST['idproveedor'];
            $fecha_registro = date('Y-m-d'); // Establece la fecha de registro a la fecha actual
    
            // Manejo de la imagen
            $image_path = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $imagen = $_FILES['imagen'];
                $target_dir = "../subido/";
                $image_path = $target_dir . basename($imagen["name"]);
                
                // Mover el archivo subido a la carpeta de destino
                if (move_uploaded_file($imagen["tmp_name"], $image_path)) {
                    // La imagen se ha subido exitosamente
                } else {
                    // Manejar el error al mover el archivo
                    echo "Error al subir la imagen.";
                    return;
                }
            }
    
            $this->productoModel->createProducto($nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $fecha_registro, $image_path);
            header("Location: ProductoController.php?action=index");
        }
    }
    
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $idcategoria = $_POST['idcategoria'];
            $idproveedor = $_POST['idproveedor'];
    
            // Manejo de la imagen
            $image_path = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $imagen = $_FILES['imagen'];
                $target_dir = "subido/";
                $image_path = $target_dir . basename($imagen["name"]);
                
                // Mover el archivo subido a la carpeta de destino
                if (move_uploaded_file($imagen["tmp_name"], $image_path)) {
                    // La imagen se ha subido exitosamente
                } else {
                    // Manejar el error al mover el archivo
                    echo "Error al subir la imagen.";
                    return;
                }
            }
    
            $this->productoModel->updateProducto($id, $nombre, $descripcion, $precio, $stock, $idcategoria, $idproveedor, $image_path);
            header("Location: ProductoController.php?action=index");
        }
    }
    

    public function delete($id) {
        $this->productoModel->deleteProducto($id);
        header("Location: ProductoController.php?action=index");
    }
}

$controller = new ProductoController();
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
