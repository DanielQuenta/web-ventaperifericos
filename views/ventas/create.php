<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Venta</title>
    <style>
        .hidden {
            display: none;
        }
        .responsive-image {
            max-width: 100%; /* Ajusta al ancho del contenedor */
            height: auto;    /* Mantiene la proporción */
        }
    </style>
    <script>
        function toggleImage() {
            var metodo_pago = document.querySelector('input[name="metodo_pago"]:checked').value;
            var qrImage = document.getElementById('qrImage');

            if (metodo_pago === 'qr') {
                qrImage.classList.remove('hidden'); // Muestra la imagen
            } else {
                qrImage.classList.add('hidden'); // Oculta la imagen
            }
        }
        function generarTexto() {
            // Obtiene el método de pago seleccionado
            var metodo_pago = document.querySelector('input[name="metodo_pago"]:checked').value;
            var qrImage = document.getElementById('qrImage');

            // Verifica si el método de pago es QR y muestra la imagen si es necesario
            if (metodo_pago === 'qr') {
                qrImage.classList.remove('hidden'); // Asegura que la imagen esté visible
            }

            // Genera el texto para la ventana emergente
            var texto = "N°Cuenta: " + metodo_pago + ". 7845 7845 7845.";

            // Muestra la ventana emergente con el texto
            alert(texto);
        }
    </script>
</head>
<body>
<?php include(__DIR__ . '/../templates/header2.php'); ?>

    <h1>Crear Venta</h1>

    <!-- Mensaje de éxito o error -->
    <?php if (isset($_SESSION['message'])): ?>
        <div>
            <?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); // Eliminar el mensaje después de mostrarlo ?>
        </div>
    <?php endif; ?>

    <form action="../controllers/VentaController.php?action=store" method="post" enctype="multipart/form-data">
        
        <!-- Campo oculto para ID Cliente -->
        <input type="hidden" id="idcliente" name="idcliente" value="<?php echo htmlspecialchars($_GET['id']); ?>" required>

        <label for="total">Total:</label>
        <input type="number" step="0.01" id="total" name="total" required>
        <br>

        <label for="fecha_venta">Fecha:</label>
        <input type="date" id="fecha_venta" name="fecha_venta" required>
        <br>

        <label>Método de Pago:</label><br>

        <button type="button" onclick="generarTexto()">N° Cuenta</button>
        <label for="transferencia">
            <input type="radio" name="metodo_pago" value="Transferencia" onchange="toggleImage()" checked> Transferencia
        </label>

        <input type="radio" id="qr" name="metodo_pago" value="qr" onclick="toggleImage()">
        <label for="qr">QR</label><br>

        <div class="container">
            <h1>Imagen del Comprobante de Pago</h1>
            <img id="qrImage" src="../views/img/QR_1.jpeg" alt="Descripción de la imagen" class="responsive-image hidden" width="150" height="200">
        </div>

        <br>
        <label for="imagen">Imagen del COMPROBANTE DE PAGO:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>
        <br>

        <input type="submit" value="Crear">
    </form>

    <div class="links">
        <a href="../views/welcome2.php">Volver al inicio</a>
    </div>

    <?php include(__DIR__ . '/../templates/footer2.php'); ?>
</body>
</html>
