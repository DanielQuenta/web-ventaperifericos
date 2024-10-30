<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Editar Cliente</h1>

    <form action="../controllers/UsuarioController.php?action=update&id=<?php echo $cliente['idcliente']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="<?php echo $cliente['apellido']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="<?php echo $cliente['telefono']; ?>">

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" value="<?php echo $cliente['direccion']; ?>">

    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $cliente['username']; ?>" required>

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Ingrese nueva contraseña si desea cambiarla">

    <button type="submit">Actualizar Cliente</button>
</form>
<div>
<a href="../controllers/ClienteController.php?action=index">Volver a la lista</a>
</div>

<div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>

</body>
</html>
