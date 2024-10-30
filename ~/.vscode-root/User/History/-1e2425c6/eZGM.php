<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="UsuarioController.php?action=update&id=<?php echo $usuario['id']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $usuario['username']; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $usuario['password']; ?>" required>
        <br>
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="cliente" <?php if ($usuario['tipo'] == 'cliente') echo 'selected'; ?>>Cliente</option>
            <option value="empleado" <?php if ($usuario['tipo'] == 'empleado') echo 'selected'; ?>>Empleado</option>
            <option value="administrador" <?php if ($usuario['tipo'] == 'administrador') echo 'selected'; ?>>Administrador</option>
        </select>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
