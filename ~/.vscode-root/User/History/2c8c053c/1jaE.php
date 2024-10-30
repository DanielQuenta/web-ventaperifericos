<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prenda</title>
</head>
<body>
    <h1>Editar Prenda</h1>
    <form action="../controllers/PrendaController.php?action=update&id=<?php echo $prenda['id']; ?>" method="post">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $prenda['descripcion']; ?>" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="<?php echo $prenda['precio']; ?>" required>
        <br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $prenda['cantidad']; ?>" required>
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="nueva" <?php if ($prenda['estado'] == 'nueva') echo 'selected'; ?>>Nueva</option>
            <option value="usada" <?php if ($prenda['estado'] == 'usada') echo 'selected'; ?>>Usada</option>
            <option value="muy usada" <?php if ($prenda['estado'] == 'muy usada') echo 'selected'; ?>>Muy Usada</option>
            <option value="buen estado" <?php if ($prenda['estado'] == 'buen estado') echo 'selected'; ?>>Buen Estado</option>
            <option value="regular" <?php if ($prenda['estado'] == 'regular') echo 'selected'; ?>>Regular</option>
            <option value="mala" <?php if ($prenda['estado'] == 'mala') echo 'selected'; ?>>Mala</option>
        </select>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
