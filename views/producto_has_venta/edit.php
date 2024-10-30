<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="icon" href="fzz.jpg">
    <link rel="stylesheet" href="../estilos.css"> <!-- Asegúrate de que tu archivo CSS está correctamente enlazado -->
</head>
<body>
    <h1>Editar Cliente</h1>

    <form action="../controllers/UsuarioController.php?action=update&id=<?php echo $cliente['idcliente']; ?>" method="POST">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required>
        </div>

        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?php echo htmlspecialchars($cliente['apellido']); ?>" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($cliente['email']); ?>" required>
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($cliente['telefono']); ?>">
        </div>

        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo htmlspecialchars($cliente['direccion']); ?>">
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($cliente['username']); ?>" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Ingrese nueva contraseña si desea cambiarla">
        </div>

        <button type="submit">Actualizar Cliente</button>
    </form>

    <a href="../controllers/UsuarioController.php?action=index">Volver a la lista</a> <!-- Añadido enlace para volver -->
</body>
</html>
