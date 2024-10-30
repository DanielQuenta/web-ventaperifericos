<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Proveedores</h1>
    <a href="../controllers/ProveedorController.php?action=create">Crear Nuevo Proveedor</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($proveedores as $proveedor): ?>
            <tr>
                <td><?php echo $proveedor['idproveedor']; ?></td>
                <td><?php echo $proveedor['nombre']; ?></td>
                <td><?php echo $proveedor['telefono']; ?></td>
                <td><?php echo $proveedor['email']; ?></td>
                <td><?php echo $proveedor['direccion']; ?></td>
                <td>
                    <a href="../controllers/ProveedorController.php?action=show&id=<?php echo $proveedor['idproveedor']; ?>">Ver</a>
                    <a href="../controllers/ProveedorController.php?action=edit&id=<?php echo $proveedor['idproveedor']; ?>">Editar</a>
                    <a href="../controllers/ProveedorController.php?action=delete&id=<?php echo $proveedor['idproveedor']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../views/welcome3.php">VOLVER INICIO</a>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
