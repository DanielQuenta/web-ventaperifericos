<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Venta.php"; // Asegúrate de que la clase Venta esté correctamente implementada.

class VentaController {
    private $ventaModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->ventaModel = new Venta($db);
    }

    public function index() {
        $ventas = $this->ventaModel->getAllVentas();
        include "../views/ventas/index.php"; // Asegúrate de tener la vista correcta.
    }

    public function index2() {
        $ventas = $this->ventaModel->getAllVentas();
        include "../views/ventas/index2.php"; // Asegúrate de tener la vista correcta.
    }

    public function show($id) {
        $venta = $this->ventaModel->getVentaById($id);
        include "../views/ventas/show.php"; // Asegúrate de tener la vista correcta.
    }

    public function show2($id) {
        $venta = $this->ventaModel->getVentaById($id);
        include "../views/ventas/show2.php"; // Asegúrate de tener la vista correcta.
    }

    public function create() {
        include "../views/ventas/create.php"; // Asegúrate de tener la vista correcta.
    }

    public function create2() {
        include "../views/ventas/create2.php"; // Asegúrate de tener la vista correcta.
    }



    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recolectar datos del formulario
            $idcliente = $_POST['idcliente'];
            $fecha_venta = $_POST['fecha_venta']; // Este campo debe estar en el formulario
            $total = $_POST['total'];
            $metodo_pago = $_POST['metodo_pago']; // Este campo también debe estar en el formulario
    
            // Manejo de la imagen
            $image_path = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $imagen = $_FILES['imagen'];
                $target_dir = "../subido/COMPROBANTES/"; // Directorio donde se almacenará la imagen
                $image_path = $target_dir . basename($imagen["name"]);
                
                // Mover el archivo subido a la carpeta de destino
                if (move_uploaded_file($imagen["tmp_name"], $image_path)) {
                    // La imagen se ha subido exitosamente
                } else {
                    // Manejar el error al mover el archivo
                    echo "Error al subir la imagen.";
                    return;
                }
            } else {
                // Puedes manejar el caso de que no se suba una imagen (opcional)
                echo "No se ha subido ninguna imagen.";
                return;
            }
    
            // Llamar al modelo para crear la venta
            if ($this->ventaModel->createVenta($idcliente, $fecha_venta, $total, $metodo_pago, $image_path)) {
                // Redireccionar a la lista de ventas si se crea correctamente
                header("Location: VentaController.php?action=index");
                exit();
            } else {
                // Manejar error en la creación de la venta
                echo "Error al crear la venta.";
                return;
            }
        }
    }
    public function store2() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recolectar datos del formulario
            $idcliente = $_POST['idcliente'];
            $fecha_venta = $_POST['fecha_venta']; // Este campo debe estar en el formulario
            $total = $_POST['total'];
            $metodo_pago = $_POST['metodo_pago']; // Este campo también debe estar en el formulario
    
            // Manejo de la imagen
            $image_path = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $imagen = $_FILES['imagen'];
                $target_dir = "../subido/COMPROBANTES"; // Directorio donde se almacenará la imagen
                $image_path = $target_dir . basename($imagen["name"]);
                
                // Mover el archivo subido a la carpeta de destino
                if (move_uploaded_file($imagen["tmp_name"], $image_path)) {
                    // La imagen se ha subido exitosamente
                } else {
                    // Manejar el error al mover el archivo
                    echo "Error al subir la imagen.";
                    return;
                }
            } else {
                // Puedes manejar el caso de que no se suba una imagen (opcional)
                echo "No se ha subido ninguna imagen.";
                return;
            }
    
            // Llamar al modelo para crear la venta
            if ($this->ventaModel->createVenta($idcliente, $fecha_venta, $total, $metodo_pago, $image_path)) {
                // Redireccionar a la lista de ventas si se crea correctamente
                header("Location: views/ventas/index2.php"); // Modificado aquí
                exit();
            } else {
                // Manejar error en la creación de la venta
                echo "Error al crear la venta.";
                return;
            }
        }
    }
    

    public function edit($id) {
        $venta = $this->ventaModel->getVentaById($id);
        include "../views/ventas/edit.php"; // Asegúrate de tener la vista correcta.
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idcliente = $_POST['idcliente'];
            $fecha_venta = $_POST['fecha_venta'];
            $total = $_POST['total'];
            $metodo_pago = $_POST['metodo_pago'];
            
            // Manejo de la imagen
            $imagen_url = $this->handleImageUpload(); // Maneja la carga de la imagen
    
            // Si no se subió una nueva imagen, obtenemos la imagen actual
            if ($imagen_url === false) {
                // Manejar el caso donde no hay imagen nueva
                // Podrías obtener la imagen existente de la base de datos si es necesario
                $venta = $this->ventaModel->getVentaById($id); // Obtener la venta actual
                $imagen_url = $venta['imagen']; // Usar la imagen existente
            }
    
            // Actualizar venta
            $updateResult = $this->ventaModel->updateVenta($id, $idcliente, $fecha_venta, $total, $metodo_pago, $imagen_url);
            
            // Verifica si la actualización fue exitosa
            if ($updateResult) {
                $_SESSION['message'] = "Venta actualizada exitosamente.";
            } else {
                $_SESSION['message'] = "Error al actualizar la venta.";
            }
    
            header("Location: VentaController.php?action=index2");
            exit();
        } else {
            // Manejar el caso donde no es un POST
            $_SESSION['message'] = "Solicitud inválida.";
            header("Location: VentaController.php?action=index2");
            exit();
        }
    }
    

    public function delete($id) {
        $this->ventaModel->deleteVenta($id);
        $_SESSION['message'] = "Venta eliminada exitosamente.";
        header("Location: VentaController.php?action=index2");
        exit();
    }

    private function handleImageUpload() {
        // Verifica si el archivo ha sido subido correctamente
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Define el directorio donde se almacenarán las imágenes
            $targetDir = "/subido/COMPROBANTES"; // Asegúrate de que el directorio `uploads` exista y tenga permisos de escritura
            $fileName = basename($_FILES['imagen']['name']);
            $targetFilePath = $targetDir . $fileName;
            
            // Obtén la extensión del archivo y verifica que sea una imagen válida
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    
            if (in_array(strtolower($fileType), $allowedTypes)) {
                // Intenta mover el archivo subido al directorio de destino
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFilePath)) {
                    return $targetFilePath; // Devuelve la ruta de la imagen almacenada
                } else {
                    $_SESSION['message'] = "Error al mover la imagen al directorio de destino.";
                    return false;
                }
            } else {
                $_SESSION['message'] = "Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF).";
                return false;
            }
        }
        // Si no se subió una imagen o hubo un error, retorna false
        return false;
    }
    
}

$controller = new VentaController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($id);
        break;
    case 'show2':
        $controller->show2($id);
        break;
    case 'create':
        $controller->create();
        break;
    case 'create2':
        $controller->create2();
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
    case 'index2': // Añade este caso para index2
        $controller->index2();
        break;
    default:
        $controller->index();
        break;
}
?>
