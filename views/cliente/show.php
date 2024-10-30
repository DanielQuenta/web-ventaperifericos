<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuario</title>
    <link rel="icon" href="fzz.jpg">
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>

<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Ver Usuario</h1>
    <p>ID: <?php echo $usuario['idcliente']; ?></p>
    <p>Nombre: <?php echo htmlspecialchars($usuario['nombre']); ?></p>
    <p>Apellido: <?php echo htmlspecialchars($usuario['apellido']); ?></p>
    <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
    <p>Teléfono: <?php echo htmlspecialchars($usuario['telefono']); ?></p>
    <p>Dirección: <?php echo htmlspecialchars($usuario['direccion']); ?></p>
    <p>Fecha de Registro: <?php echo htmlspecialchars($usuario['fecha_registro']); ?></p>
    <p>Username: <?php echo htmlspecialchars($usuario['username']); ?></p>
    <a href="UsuarioController.php?action=index">Volver a la lista</a>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
