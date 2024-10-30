<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Empleado</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Ver Empleado</h1>
    <p>ID: <?php echo $empleado['idempleado']; ?></p>
    <p>Nombre: <?php echo $empleado['nombre']; ?></p>
    <p>Apellido: <?php echo $empleado['apellido']; ?></p>
    <p>Email: <?php echo $empleado['email']; ?></p>
    <p>Teléfono: <?php echo $empleado['telefono']; ?></p>
    <p>Cargo: <?php echo $empleado['cargo']; ?></p>
    <p>Fecha de Contratación: <?php echo $empleado['fecha_contratacion']; ?></p>
    <p>Salario: <?php echo number_format($empleado['salario'], 2); ?></p>
    <a href="../controllers/EmpleadoController.php?action=index">Volver a la lista</a>
    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>

