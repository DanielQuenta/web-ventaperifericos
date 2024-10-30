<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Prenda</title>
</head>
<body>
    <h1>Crear Prenda</h1>
    <form action="../controllers/PrendaController.php?action=store" method="post">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>
        <br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="nueva">Nueva</option>
            <option value="usada">Usada</option>
            <option value="muy usada">Muy Usada</option>
            <option value="buen estado">Buen Estado</option>
            <option value="regular">Regular</option>
            <option value="mala">Mala</option>
        </select>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
