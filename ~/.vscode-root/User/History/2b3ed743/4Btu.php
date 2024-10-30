<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mercancía</title>
</head>
<body>
    <h1>Crear Mercancía</h1>
    <form action="../controllers/MercanciaController.php?action=store" method="post">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
