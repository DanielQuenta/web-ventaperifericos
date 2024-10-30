<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pago</title>
</head>
<body>
    <h1>Métodos de Pago</h1>
    <a href="../controllers/MetodoPagoController.php?action=create">Crear Nuevo Método de Pago</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Detalles</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($metodos_pago as $metodo): ?>
            <tr>
                <td><?php echo $metodo['id']; ?></td>
                <td><?php echo $metodo['tipo']; ?></td>
                <td><?php echo $metodo['detalles']; ?></td>
                <td>
                    <a href="../controllers/MetodoPagoController.php?action=show&id=<?php echo $metodo['id']; ?>">Ver</a>
                    <a href="../controllers/MetodoPagoController.php?action=edit&id=<?php echo $metodo['id']; ?>">Editar</a>
                    <a href="../controllers/MetodoPagoController.php?action=delete&id=<?php echo $metodo['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
