<?php
session_start();
require_once "../models/Database.php";
require_once "../models/Usuario.php";

class LoginController {
    private $usuarioModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuarioModel = new Usuario($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->usuarioModel->getUsuario($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: ../views/welcome.php");
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }
    }
}

$controller = new LoginController();
$controller->login();
?>

