<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto en Venta</title>
    <link rel="stylesheet" href="../estilos.css"> <!-- Enlace a tu CSS -->
</head>
<body>
    <h1>Crear Producto en Venta</h1>
    <form action="../controllers/ProductoHasVentaController.php?action=store" method="post">
        <label for="idproducto">ID Producto:</label>
        <input type="number" id="idproducto" name="idproducto" required>
        <br>

        <label for="idventa">ID Venta:</label>
        <input type="number" id="idventa" name="idventa" required>
        <br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        <br>

        <label for="precio_unitario">Precio Unitario:</label>
        <input type="text" id="precio_unitario" name="precio_unitario" required>
        <br>

        <input type="submit" value="Crear">
    </form>

    <a href="../views/welcome3.php">Volver al Inicio</a> <!-- Enlace para volver al inicio -->
</body>
</html>
