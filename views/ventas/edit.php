<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta</title>
</head>
<body>

<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Editar Venta</h1>
    <form action="VentaController.php?action=update&id=<?php echo $venta['idventa']; ?>" method="POST" enctype="multipart/form-data">
    <input type="text" name="idcliente" value="<?php echo $venta['idcliente']; ?>" required>
    <input type="date" name="fecha_venta" value="<?php echo $venta['fecha_venta']; ?>" required>
    <input type="number" name="total" value="<?php echo $venta['total']; ?>" required>
    <input type="text" name="metodo_pago" value="<?php echo $venta['metodo_pago']; ?>" required>
    <input type="file" name="imagen">
    <button type="submit">Actualizar Venta</button>
</form>

    <div class="links">
        <a href="../views/welcome3.php">Volver al inicio</a>
    </div>
<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
