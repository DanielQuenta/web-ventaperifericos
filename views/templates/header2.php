<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Mi Sitio Web'; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
</head>
<body>
    <header>
    <div class="titulo">
            <a href="#"><img class="logo" src="/CODIGOs/venta_perifericos/views/img/logo/logocine.png" width="100" alt="logocine" height="80"></a>
            <h1 class="cinecc">FAZBEAR</h1>
        </div>
        <nav>
            <script>
                function recorrer(a){
                    window.scrollTo(0,  window.scrollY + document.querySelector('#' + a).getBoundingClientRect().top);
                }
            </script>
        </nav>

        <div class="slider">
            <div>
                <a href="#"><img src="img/slider/slider1.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider2.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider3.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider4.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider5.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider6.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider7.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider8.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider9.jpg" alt=""></a>
                <a href="#"><img src="img/slider/slider10.jpg" alt=""></a>
            </div>
        </div>
    </header>
