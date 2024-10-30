<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }
require_once "../models/Database.php";
require_once "../models/Producto.php";

// Conectar a la base de datos y obtener los productos
$database = new Database();
$db = $database->getConnection();
$productoModel = new Producto($db);
$productos = $productoModel->getAllProductos(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="icon" href="fzz.jpg">

</head>
<body>
<?php include('templates/header.php'); ?>

<div class="header-right">
    <a href="../views/login.php" class="login-link">
        <span class="login-text-icon">
            <h4>Iniciar Sesión</h4>
            <img src="../views/img/contactos/usuario.png" alt="Iniciar Sesión" class="login-icon">
        </span>
    </a>
</div>


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
             
                    <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($producto['fecha_registro']); ?></p>
                    <div class="producto-acciones">
                        <a href="../controllers/ProductoController.php?action=show&id=<?php echo $producto['idproducto']; ?>">Ver</a>

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
