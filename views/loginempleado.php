<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Login</title>
</head>
<body>
    <?php include('templates/header.php'); ?>

    <div class="login-container">
        <form action="../controllers/Login2Controller.php" method="post" class="login-form">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="links">
                <a href="../views/welcome.php">Volver al inicio</a>
                <a href="../views/welcome2.php">Inisiar sesion como usuario</a>
            </div>
        </form>
    </div>

    <?php include('templates/footer.php'); ?>
</body>
</html>