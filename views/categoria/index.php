<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Categorías</title>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Listado de Categorías</h1>
    <a href="../controllers/CategoriaController.php?action=create">Crear Nueva Categoría</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de la Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?php echo htmlspecialchars($categoria['idcategoria']); ?></td>
                    <td><?php echo htmlspecialchars($categoria['nombre_categoria']); ?></td>
                    <td>
                        <a href="../controllers/CategoriaController.php?action=show&id=<?php echo $categoria['idcategoria']; ?>">Ver</a>
                        <a href="../controllers/CategoriaController.php?action=edit&id=<?php echo $categoria['idcategoria']; ?>">Editar</a>
                        <a href="../controllers/CategoriaController.php?action=delete&id=<?php echo $categoria['idcategoria']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar esta categoría?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="links">
                <a href="../views/welcome3.php">Volver al inicio</a>
            </div>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
