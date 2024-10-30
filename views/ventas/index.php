<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Listado de Ventas</h1>
    <!--<a href="../controllers/VentaController.php?action=create">Crear Nueva Venta</a>-->
    <table border="1">
        <tr>

            <th>ID Cliente</th>
            <th>Método de Pago</th>
            <th>Fecha de Venta</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($ventas as $venta): ?>
            <tr>
                <td><?php echo $venta['idcliente']; ?></td>
        
                <td><?php echo $venta['metodo_pago']; ?></td>
                <td><?php echo $venta['fecha_venta']; ?></td>
                <td><?php echo $venta['total']; ?></td>
                <td>
                    <a href="../controllers/VentaController.php?action=show&id=<?php echo $venta['idventa']; ?>">Ver</a>
                    <!--<a href="../controllers/VentaController.php?action=edit&id=<?php echo $venta['idventa']; ?>">Editar</a>
                    <a href="../controllers/VentaController.php?action=delete&id=<?php echo $venta['idventa']; ?>">Eliminar</a>-->
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../views/welcome2.php">VOLVER INICIO</a>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
