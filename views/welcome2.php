<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require_once "../models/Database.php";
require_once "../models/Producto.php";

// Conectar a la base de datos y obtener los productos
$database = new Database();
$db = $database->getConnection();
$productoModel = new Producto($db);
$productos = $productoModel->getAllProductos(); // Método que obtiene todos los productos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - FAZBEAR</title>
    <link rel="icon" href="fzz.jpg">
    <link rel="stylesheet" href="estilos/estilos.css">
 

</head>
<body>
<?php include('templates/header.php'); ?>

<h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></h4>
<a href="../controllers/LogoutController.php">Cerrar sesión</a>
<br>
<!--
<a href="../controllers/ProductoController.php?action=create">Agregar Nuevo Producto</a>
-->
<h1>Listado de Productos</h1>
<div class="productos-container">
    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="producto-card">
                <img src="../subido/<?php echo htmlspecialchars($producto['image_path']); ?>" 
                     alt="Imagen de <?php echo htmlspecialchars($producto['nombre']); ?>" 
                     class="imagen-producto">
                <div class="producto-info">
                    <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['descripcion']); ?></p>
                    <p><strong>Precio:</strong> Bs.<?php echo htmlspecialchars($producto['precio']); ?></p>
                    <p><strong>Stock:</strong> <?php echo htmlspecialchars($producto['stock']); ?></p>
               
                    
                    <div class="producto-acciones">
                        <a href="../controllers/ProductoController.php?action=show&id=<?php echo $producto['idproducto']; ?>">Ver</a>
                        <a href="../controllers/VentaController.php?action=create&id=<?php echo $producto['idproducto']; ?>">AÑADIR COMPRA</a>
                        <!--<a href="../controllers/ProductoController.php?action=edit&id=<?php echo $producto['idproducto']; ?>">Editar</a>
                        <a href="../controllers/ProductoController.php?action=delete&id=<?php echo $producto['idproducto']; ?>" 
                           onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</a>-->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>
</body>
</html>
