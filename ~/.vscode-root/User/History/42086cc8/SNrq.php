<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['user']['username']; ?></h1>
    <a href="../controllers/LogoutController.php">Logout</a>
    <br>
    <a href="../controllers/UsuarioController.php?action=index">Gestionar Usuarios</a>
    <br>
    <a href="../controllers/MetodoPagoController.php?action=index">Gestionar Métodos de Pago</a>
    <br>
    <a href="../controllers/MercanciaController.php?action=index">Gestionar Mercancías</a>
    <br>
    <a href="../controllers/PrendaController.php?action=index">Gestionar Prendas</a>
</body>
</html>






