<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Crear Cliente</h1>
    <form action="../../controllers/UsuarioController.php?action=store" method="post">
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
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        <br>
        
        <label for="fecha_registro">Fecha de Registro:</label>
        <input type="date" id="fecha_registro" name="fecha_registro" required>
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
        <a href="../welcome3.php">Volver al inicio</a>
    </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
