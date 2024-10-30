<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Editar Proveedor</h1>
    <form action="../controllers/ProveedorController.php?action=update&id=<?php echo $proveedor['idproveedor']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $proveedor['nombre']; ?>" required>
        <br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $proveedor['telefono']; ?>" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $proveedor['email']; ?>" required>
        <br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $proveedor['direccion']; ?>" required>
        <br>
        
        <input type="submit" value="Actualizar">
    </form>
    <a href="../controllers/ProveedorController.php?action=index">Volver a la lista</a>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
