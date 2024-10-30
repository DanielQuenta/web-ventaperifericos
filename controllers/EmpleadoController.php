<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Empleado.php";

class EmpleadoController {
    private $empleadoModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->empleadoModel = new Empleado($db);
    }

    public function index() {
        $empleados = $this->empleadoModel->getAllEmpleados();
        include "../views/empleado/index.php";
    }

    public function show($id) {
        $empleado = $this->empleadoModel->getEmpleadoById($id);
        include "../views/empleado/show.php";
    }

    public function create() {
        include "../views/empleado/create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $cargo = $_POST['cargo'];
            $fecha_contratacion = $_POST['fecha_contratacion'];
            $salario = $_POST['salario'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Crea el nuevo empleado
            $this->empleadoModel->createEmpleado($nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $password);
            header("Location: EmpleadoController.php?action=index");
            exit; // Asegúrate de salir después de redirigir
        }
    }

    public function edit($id) {
        $empleado = $this->empleadoModel->getEmpleadoById($id);
        include "../views/empleado/edit.php";
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $cargo = $_POST['cargo'];
            $fecha_contratacion = $_POST['fecha_contratacion'];
            $salario = $_POST['salario'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Actualiza el empleado
            $this->empleadoModel->updateEmpleado($id, $nombre, $apellido, $email, $telefono, $cargo, $fecha_contratacion, $salario, $username, $password);
            header("Location: EmpleadoController.php?action=index");
            exit; // Asegúrate de salir después de redirigir
        }
    }

    public function delete($id) {
        $this->empleadoModel->deleteEmpleado($id);
        header("Location: EmpleadoController.php?action=index");
        exit; // Asegúrate de salir después de redirigir
    }
}

$controller = new EmpleadoController();
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
