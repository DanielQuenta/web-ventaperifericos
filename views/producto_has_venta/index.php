<!-- ../views/producto_has_venta/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Productos en Ventas</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Lista de Productos en Ventas</h1>
    <a href="ProductoHasVentaController.php?action=create">Agregar Producto a Venta</a>

    <table>
    <thead>
        <tr>
            <th>ID Producto</th>
            <th>ID Venta</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($productos_ventas)): ?>
            <?php foreach ($productos_ventas as $producto_venta): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto_venta['idproducto']); ?></td>
                    <td><?php echo htmlspecialchars($producto_venta['idventa']); ?></td>
                    <td><?php echo htmlspecialchars($producto_venta['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($producto_venta['precio_unitario']); ?></td>
                    <td>
                        <!-- Aquí puedes agregar los botones de acción (editar, eliminar, etc.) -->
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No se encontraron registros.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
    
</body>
</html>
