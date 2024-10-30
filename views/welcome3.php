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

</head>
<body>
<?php include('templates/header.php'); ?>

<h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></h4>
<a href="../controllers/LogoutController.php">Cerrar sesión</a>

    <button id="toggle-button" class="toggle-button">Gestión</button>

    <div id="link-container" class="link-container" style="display: none;">
        <a class="link-item" href="../controllers/ProductoController.php?action=index">GESTIONAR Producto</a>
        <a class="link-item" href="../controllers/UsuarioController.php?action=index">Gestionar clientes</a>
        <a class="link-item" href="../controllers/ventaController.php?action=index2">Gestionar VENTAS</a>
        <a class="link-item" href="../controllers/EmpleadoController.php?action=index">Gestionar Empleados</a>
        <a class="link-item" href="../controllers/CategoriaController.php?action=index">Gestionar categorias</a>
        <!--<a class="link-item" href="../controllers/ProductohasventaController.php?action=index">Gestionar producto venta</a>-->
        <a class="link-item" href="../controllers/ProveedorController.php?action=index">Gestionar Proveedor</a>
    </div>

    <script src="templates/script.js"></script> <!-- Asegúrate de que esta ruta sea correcta -->    



<h1>Listado de Productos</h1>


<table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>ID Categoría</th>
            <th>ID Proveedor</th>
            <th>Fecha de Registro</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['idproducto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($producto['precio']); ?></td>
                    <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                    <td><?php echo htmlspecialchars($producto['idcategoria']); ?></td>
                    <td><?php echo htmlspecialchars($producto['idproveedor']); ?></td>
                    <td><?php echo htmlspecialchars($producto['fecha_registro']); ?></td>
                    <td>
                        <img src="../subido/<?php echo htmlspecialchars($producto['image_path']); ?>" 
                             alt="Imagen de <?php echo htmlspecialchars($producto['nombre']); ?>" 
                             class="imagen-producto" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                       
                        <a href="../controllers/ProductoController.php?action=edit&id=<?php echo $producto['idproducto']; ?>">Editar</a>
                        <a href="../controllers/ProductoController.php?action=delete&id=<?php echo $producto['idproducto']; ?>" 
                           onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">No hay productos disponibles.</td>
            </tr>
        <?php endif; ?>
    </table>

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
                    <p><strong>Precio:</strong> Bs<?php echo htmlspecialchars($producto['precio']); ?></p>
                    <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($producto['stock']); ?></p>
                    <p><strong>Categoría:</strong> <?php echo htmlspecialchars($producto['idcategoria']); ?></p>
                    <p><strong>Proveedor:</strong> <?php echo htmlspecialchars($producto['idproveedor']); ?></p>
                    <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($producto['fecha_registro']); ?></p>
                    <div class="producto-acciones">
                      
                        <a href="../controllers/ProductoController.php?action=edit&id=<?php echo $producto['idproducto']; ?>">Editar</a>
                        <a href="../controllers/ProductoController.php?action=delete&id=<?php echo $producto['idproducto']; ?>" 
                           onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</a>
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
