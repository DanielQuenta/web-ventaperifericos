<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Prenda</title>
</head>
<body>
    <h1>Ver Prenda</h1>
    <p>ID: <?php echo $prenda['id']; ?></p>
    <p>Descripción: <?php echo $prenda['descripcion']; ?></p>
    <p>Precio: <?php echo $prenda['precio']; ?></p>
    <p>Cantidad: <?php echo $prenda['cantidad']; ?></p>
    <p>Estado: <?php echo $prenda['estado']; ?></p>
    <a href="../controllers/PrendaController.php?action=index">Volver a la lista</a>
</body>
</html>
