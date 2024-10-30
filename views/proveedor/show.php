<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Proveedor</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Ver Proveedor</h1>
    <p>ID: <?php echo $proveedor['idproveedor']; ?></p>
    <p>Nombre: <?php echo $proveedor['nombre']; ?></p>
    <p>Teléfono: <?php echo $proveedor['telefono']; ?></p>
    <p>Email: <?php echo $proveedor['email']; ?></p>
    <p>Dirección: <?php echo $proveedor['direccion']; ?></p>
    <a href="../controllers/ProveedorController.php?action=index">Volver a la lista</a>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>


