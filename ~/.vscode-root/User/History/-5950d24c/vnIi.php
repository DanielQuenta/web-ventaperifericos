<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendas</title>
</head>
<body>
    <h1>Prendas</h1>
    <a href="../controllers/PrendaController.php?action=create">Crear Nueva Prenda</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($prendas as $prenda): ?>
            <tr>
                <td><?php echo $prenda['id']; ?></td>
                <td><?php echo $prenda['descripcion']; ?></td>
                <td><?php echo $prenda['precio']; ?></td>
                <td><?php echo $prenda['cantidad']; ?></td>
                <td><?php echo $prenda['estado']; ?></td>
                <td>
                    <a href="../controllers/PrendaController.php?action=show&id=<?php echo $prenda['id']; ?>">Ver</a>
                    <a href="../controllers/PrendaController.php?action=edit&id=<?php echo $prenda['id']; ?>">Editar</a>
                    <a href="../controllers/PrendaController.php?action=delete&id=<?php echo $prenda['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
