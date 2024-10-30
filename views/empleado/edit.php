<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>


<h1>Editar Empleado</h1>
    <form action="../controllers/EmpleadoController.php?action=update&id=<?php echo $empleado['idempleado']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>
        <br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $empleado['apellido']; ?>" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $empleado['email']; ?>" required>
        <br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $empleado['telefono']; ?>" required>
        <br>
        
        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" required>
            <option value="Vendedor" <?php echo $empleado['cargo'] == 'Vendedor' ? 'selected' : ''; ?>>Vendedor</option>
            <option value="Gerente" <?php echo $empleado['cargo'] == 'Gerente' ? 'selected' : ''; ?>>Gerente</option>
        </select>
        <br>
        
        <label for="fecha_contratacion">Fecha de Contratación:</label>
        <input type="date" id="fecha_contratacion" name="fecha_contratacion" value="<?php echo $empleado['fecha_contratacion']; ?>" required>
        <br>
        
        <label for="salario">Salario:</label>
        <input type="number" id="salario" name="salario" step="0.01" value="<?php echo $empleado['salario']; ?>" required>
        <br>
        
        <input type="submit" value="Actualizar">
    </form>
</form>
<a href="../controllers/EmpleadoController.php?action=index">Volver a la lista</a>

    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
