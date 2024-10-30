<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="icon" href="fzz.jpg">
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>

<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Usuarios</h1>
    <a href="../controllers/UsuarioController.php?action=create">Crear Nuevo Usuario</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Username</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['idcliente']; ?></td>
                <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                <td><?php echo htmlspecialchars($usuario['apellido']); ?></td>
                <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>
                <td><?php echo htmlspecialchars($usuario['username']); ?></td>
                <td>
                    <a href="../controllers/UsuarioController.php?action=show&id=<?php echo $usuario['idcliente']; ?>">Ver</a>
                    <a href="../controllers/UsuarioController.php?action=edit&id=<?php echo $usuario['idcliente']; ?>">Editar</a>
                    <a href="../controllers/UsuarioController.php?action=delete&id=<?php echo $usuario['idcliente']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
 
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>

