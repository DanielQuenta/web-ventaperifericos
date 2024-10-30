<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="UsuarioController.php?action=create">Crear Nuevo Usuario</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['username']; ?></td>
                <td><?php echo $usuario['tipo']; ?></td>
                <td>
                    <a href="UsuarioController.php?action=show&id=<?php echo $usuario['id']; ?>">Ver</a>
                    <a href="UsuarioController.php?action=edit&id=<?php echo $usuario['id']; ?>">Editar</a>
                    <a href="UsuarioController.php?action=delete&id=<?php echo $usuario['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
