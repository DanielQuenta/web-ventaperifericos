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
            
            // Depuración: Imprimir los valores recibidos
            echo "Username: $username<br>";
            echo "Password: $password<br>";

            $user = $this->usuarioModel->getUsuario($username, $password);
            
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: ../views/welcome.php");
            } else {
                echo "Usuario o contraseña incorrectos<br>";

                // Depuración: Imprimir el último error de la base de datos
                echo "Error de MySQL: " . $this->usuarioModel->db->error . "<br>";
            }
        }
    }
}

$controller = new LoginController();
$controller->login();
?>


