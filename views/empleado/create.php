<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Crear Empleado</h1>
    <form action="../controllers/EmpleadoController.php?action=store" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br>
        
        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" required>
            <option value="Vendedor">Vendedor</option>
            <option value="Gerente">Gerente</option>
        </select>
        <br>
        
        <label for="fecha_contratacion">Fecha de Contratación:</label>
        <input type="date" id="fecha_contratacion" name="fecha_contratacion" required>
        <br>
        
        <label for="salario">Salario:</label>
        <input type="number" id="salario" name="salario" step="0.01" required>
        <br>
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required>
        <br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        

        <input type="submit" value="Crear">
    </form>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>

