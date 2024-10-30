<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="UsuarioController.php?action=store" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="cliente">Cliente</option>
            <option value="empleado">Empleado</option>
            <option value="administrador">Administrador</option>
        </select>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
