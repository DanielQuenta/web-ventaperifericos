<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <!-- Solo una referencia a estilos.css usando una ruta absoluta desde la raíz del servidor -->

    <link rel="stylesheet" type="text/css" href="/CODIGOs/venta_perifericos/views/estilos/estilos.css">


</head>
<body>
    <footer>
        <div class="categoria footer">
            <div>
                <h2>SOPORTE TECNICO</h2>
                <p class="parrafos">El soporte técnico es el servicio que las empresas
                    ofrecen para responder las dudas de los clientes 
                    sobre el producto o servicio que adquirieron, Contactanos si tienes algun problema.</p>
            </div>
            <div>
                <h2>QUIENES SOMOS</h2>
                <p class="parrafos">"Convertirnos en el líder en tecnología accesible, ofreciendo soluciones innovadoras y confiables en electrónica y computación que potencien la vida de nuestros clientes."</p>
            </div>
            <div>
                <h2>CONTACTOS</h2>
                <div class="contactos">
                    <!-- Todas las imágenes referenciadas desde la carpeta 'views/img/contactos' -->
                    <a href="#" onclick="nombres()">
    <img src="/CODIGOs/venta_perifericos/views/img/contactos/face.png" width="60" height="60" alt="contactofacebook">
</a>
<a href="#" onclick="nombres()">
    <img src="/CODIGOs/venta_perifericos/views/img/contactos/ims.png" width="60" height="60" alt="contactoimstagram">
</a>
<a href="#" onclick="nombres()">
    <img src="/CODIGOs/venta_perifericos/views/img/contactos/wat.png" width="60" height="60" alt="contactowatsapp">
</a>
<a href="#" onclick="nombres()">
    <img src="/CODIGOs/venta_perifericos/views/img/contactos/tik.png" width="60" height="60" alt="contactotiktok">
</a>

                
                
                
                </div> 
                <script>
                    function nombres() {
                        alert("Integrantes: \n\tRafael Oporto Valencia \n\tDaniel Quenta Escobar");
                    }
                </script>
            </div>
        </div>
    </footer>
</body>
</html>
