<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mercancía</title>
</head>
<body>
    <h1>Editar Mercancía</h1>
    <form action="../controllers/MercanciaController.php?action=update&id=<?php echo $mercancia['id']; ?>" method="post">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $mercancia['descripcion']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
