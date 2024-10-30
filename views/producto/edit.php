<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>

<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Editar Producto</h1>
    <form action="../controllers/ProductoController.php?action=update&id=<?php echo $producto['idproducto']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" required>
        <br>
        <label for="stock">Cantidad:</label>
        <input type="number" id="stock" name="stock" value="<?php echo $producto['stock']; ?>" required>
        <br>
        <label for="idcategoria">ID Categoría:</label>
        <input type="number" id="idcategoria" name="idcategoria" value="<?php echo $producto['idcategoria']; ?>" required>
        <br>
        <label for="idproveedor">ID Proveedor:</label>
        <input type="number" id="idproveedor" name="idproveedor" value="<?php echo $producto['idproveedor']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>
<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>

