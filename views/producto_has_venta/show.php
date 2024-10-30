<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto en Venta</title>
    <link rel="icon" href="fzz.jpg">
    <link rel="stylesheet" href="../estilos.css"> <!-- Asegúrate de que tu archivo CSS está correctamente enlazado -->
</head>
<body>
    <h1>Detalles del Producto en Venta</h1>
    <p><strong>ID Producto:</strong> <?php echo htmlspecialchars($productoVenta['idproducto']); ?></p>
    <p><strong>ID Venta:</strong> <?php echo htmlspecialchars($productoVenta['idventa']); ?></p>
    <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($productoVenta['cantidad']); ?></p>
    <p><strong>Precio Unitario:</strong> <?php echo htmlspecialchars($productoVenta['precio_unitario']); ?></p>
    
    <a href="../controllers/producto_has_ventaController.php?action=index">Volver a la lista de Productos en Venta</a>
</body>
</html>
