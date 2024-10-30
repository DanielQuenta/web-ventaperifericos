<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Crear Producto</h1>

    <!-- Mensaje de éxito o error -->
    <?php if (isset($_SESSION['message'])): ?>
        <div>
            <?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); // Eliminar el mensaje después de mostrarlo ?>
        </div>
    <?php endif; ?>

    <form action="../controllers/ProductoController.php?action=store" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>
        <br>

        <label for="stock">Cantidad:</label>
        <input type="number" id="stock" name="stock" required>
        <br>

        <label for="idcategoria">ID Categoría:</label>
        <input type="number" id="idcategoria" name="idcategoria" required>
        <br>

        <label for="idproveedor">ID Proveedor:</label>
        <input type="number" id="idproveedor" name="idproveedor" required>
        <br>

        <label for="imagen">Imagen del Producto:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>
        <br>

        <input type="submit" value="Crear">
    </form>
    <div class="links">
        <a href="../views/welcome3.php">Volver al inicio</a>
    </div>

    <?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
