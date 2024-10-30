<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Método de Pago</title>
</head>
<body>
    <h1>Ver Método de Pago</h1>
    <p>ID: <?php echo $metodo_pago['id']; ?></p>
    <p>Tipo: <?php echo $metodo_pago['tipo']; ?></p>
    <p>Detalles: <?php echo $metodo_pago['detalles']; ?></p>
    <a href="../controllers/MetodoPagoController.php?action=index">Volver a la lista</a>
</body>
</html>
