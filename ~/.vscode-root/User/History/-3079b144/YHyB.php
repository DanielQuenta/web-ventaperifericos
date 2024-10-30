<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Método de Pago</title>
</head>
<body>
    <h1>Editar Método de Pago</h1>
    <form action="../controllers/MetodoPagoController.php?action=update&id=<?php echo $metodo_pago['id']; ?>" method="post">
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $metodo_pago['tipo']; ?>" required>
        <br>
        <label for="detalles">Detalles:</label>
        <input type="text" id="detalles" name="detalles" value="<?php echo $metodo_pago['detalles']; ?>">
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
