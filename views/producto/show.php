<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
    <link rel="icon" href="fzz.jpg">
    <link rel="stylesheet" href="../views/estilos.css">
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Ver Producto</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($producto['idproducto']); ?></p>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($producto['nombre']); ?></p>
    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['descripcion']); ?></p>
    <p><strong>Precio:</strong> <?php echo htmlspecialchars($producto['precio']); ?></p>
    <p><strong>Stock:</strong> <?php echo htmlspecialchars($producto['stock']); ?></p>
    <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($producto['fecha_registro']); ?></p>

    <!-- Mostrar la imagen del producto -->
    <?php if (!empty($producto['image_path'])): ?>
        <div>
            <strong>Imagen:</strong><br>
            <img src="<?php echo htmlspecialchars($producto['image_path']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" style="max-width: 300px; height: auto;">
        </div>
    <?php else: ?>
        <p>No hay imagen disponible para este producto.</p>
    <?php endif; ?>
<!--
    <a href="../controllers/ProductoController.php?action=index">Volver a la lista</a>
    -->
    <footer>
        <p>&copy; 2024 Nombre de la Tienda. Todos los derechos reservados.</p>
    </footer>

    <div class="links">
        <a href="../views/welcome2.php">Volver al inicio</a>
    </div>

    <?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
