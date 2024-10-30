<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuario</title>
</head>
<body>
    <h1>Ver Usuario</h1>
    <p>ID: <?php echo $usuario['id']; ?></p>
    <p>Username: <?php echo $usuario['username']; ?></p>
    <p>Tipo: <?php echo $usuario['tipo']; ?></p>
    <a href="UsuarioController.php?action=index">Volver a la lista</a>
</body>
</html>
