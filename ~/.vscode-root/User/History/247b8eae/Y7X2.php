<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Método de Pago</title>
</head>
<body>
    <h1>Crear Método de Pago</h1>
    <form action="../controllers/MetodoPagoController.php?action=store" method="post">
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required>
        <br>
        <label for="detalles">Detalles:</label>
        <input type="text" id="detalles" name="detalles">
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
