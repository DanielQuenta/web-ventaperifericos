<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Editar Categoría</h1>
    <form action="../controllers/CategoriaController.php?action=update&id=<?php echo $categoria['idcategoria']; ?>" method="post">
        <label for="nombre_categoria">Nombre de la Categoría:</label>
        <input type="text" id="nombre_categoria" name="nombre_categoria" value="<?php echo htmlspecialchars($categoria['nombre_categoria']); ?>" required>
        <br>
        
        <input type="submit" value="Actualizar Categoría">
    </form>
    <a href="../controllers/CategoriaController.php?action=index">Volver a la lista de categorías</a>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
