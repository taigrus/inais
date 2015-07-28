<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="{{ asset('css/estilos_welcome.css') }}" rel='stylesheet' type='text/css' />


    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />

    <title>Prueba de menu</title>
</head>
<body>
<div class="container">
    <h1>Consejo de Salud Rural Andino
    <span>It's not an Information System (INAIS) 0.1</span></h1>
    <ul class="ca-menu">
        <li>
            <a href= {{ route('login') }}>
                <span class="ca-icon">j</span>
                <div class="ca-content">
                    <h2 class="ca-main">Proyecto</br>BID</h2>
                    <h3 class="ca-sub">Gestión del proyecto BID-CSRA 2015</br>Solo usuarios autorizados</h3>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="ca-icon">A</span>
                <div class="ca-content">
                    <h2 class="ca-main">Exceptional Service</h2>
                    <h3 class="ca-sub">Personalized to your needs</h3>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="ca-icon">A</span>
                <div class="ca-content">
                    <h2 class="ca-main">Exceptional Service</h2>
                    <h3 class="ca-sub">Personalized to your needs</h3>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="ca-icon">A</span>
                <div class="ca-content">
                    <h2 class="ca-main">Exceptional Service</h2>
                    <h3 class="ca-sub">Personalized to your needs</h3>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="ca-icon">A</span>
                <div class="ca-content">
                    <h2 class="ca-main">Exceptional Service</h2>
                    <h3 class="ca-sub">Personalized to your needs</h3>
                </div>
            </a>
        </li>
    </ul>

</div>
<div class="more">
    <h1>Copyright 2015 - CSRA
        <span>Soporte: 2412495</span></h1>

</div>
</body>
</html>