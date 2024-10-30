<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Categoría</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Ver Categoría</h1>
    <p>ID: <?php echo htmlspecialchars($categoria['idcategoria']); ?></p>
    <p>Nombre de la Categoría: <?php echo htmlspecialchars($categoria['nombre_categoria']); ?></p>
    <a href="../controllers/CategoriaController.php?action=index">Volver a la lista de categorías</a>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
