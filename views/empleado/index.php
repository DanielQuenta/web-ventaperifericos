<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Empleados</h1>
    <a href="../controllers/EmpleadoController.php?action=create">Crear Nuevo Empleado</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Cargo</th>
            <th>Fecha de Contratación</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?php echo $empleado['idempleado']; ?></td>
                <td><?php echo $empleado['nombre']; ?></td>
                <td><?php echo $empleado['apellido']; ?></td>
                <td><?php echo $empleado['email']; ?></td>
                <td><?php echo $empleado['telefono']; ?></td>
                <td><?php echo $empleado['cargo']; ?></td>
                <td><?php echo $empleado['fecha_contratacion']; ?></td>
                <td><?php echo number_format($empleado['salario'], 2); ?></td>
                <td>
                    <a href="../controllers/EmpleadoController.php?action=show&id=<?php echo $empleado['idempleado']; ?>">Ver</a>
                    <a href="../controllers/EmpleadoController.php?action=edit&id=<?php echo $empleado['idempleado']; ?>">Editar</a>
                    <a href="../controllers/EmpleadoController.php?action=delete&id=<?php echo $empleado['idempleado']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../views/welcome3.php">VOLVER INICIO</a>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
