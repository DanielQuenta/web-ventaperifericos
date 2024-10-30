<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercancías</title>
</head>
<body>
    <h1>Mercancías</h1>
    <a href="../controllers/MercanciaController.php?action=create">Crear Nueva Mercancía</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($mercancias as $mercancia): ?>
            <tr>
                <td><?php echo $mercancia['id']; ?></td>
                <td><?php echo $mercancia['descripcion']; ?></td>
                <td>
                    <a href="../controllers/MercanciaController.php?action=show&id=<?php echo $mercancia['id']; ?>">Ver</a>
                    <a href="../controllers/MercanciaController.php?action=edit&id=<?php echo $mercancia['id']; ?>">Editar</a>
                    <a href="../controllers/MercanciaController.php?action=delete&id=<?php echo $mercancia['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
