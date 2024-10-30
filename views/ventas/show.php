<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Venta</title>
</head>

<body>

<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Ver Venta</h1>
    <p>ID: <?php echo $venta['idventa']; ?></p>
    <p>ID Cliente: <?php echo $venta['idcliente']; ?></p>

    <p>Método de Pago: <?php echo $venta['metodo_pago']; ?></p>
    <p>Fecha de Venta: <?php echo $venta['fecha_venta']; ?></p>
    <p>Total: <?php echo $venta['total']; ?></p>
    <a href="../controllers/VentaController.php?action=index">Volver a la lista</a>

<?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>


</html>
