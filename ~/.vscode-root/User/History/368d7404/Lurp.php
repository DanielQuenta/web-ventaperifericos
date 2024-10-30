<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mercancía</title>
</head>
<body>
    <h1>Ver Mercancía</h1>
    <p>ID: <?php echo $mercancia['id']; ?></p>
    <p>Descripción: <?php echo $mercancia['descripcion']; ?></p>
    <a href="../controllers/MercanciaController.php?action=index">Volver a la lista</a>
</body>
</html>
