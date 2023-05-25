<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Hobel</title>
</head>

<body>

    <?php

    require "../util/control_acceso.php";

    ?>
    <?php

    require "../public/header.php";

    ?>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobel</title>
    <!-- Cogemos la fuente Raleway de google fonts para nuestro css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-XpHk9XNVIggnS6JNbuwPi+94PQdCrK4Ti4rqD4tPXm+lB1Hpl9fzq/t+jIToEAwGlFmboG5B1Z5c5Rfln0W8Ug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="estilos.css">
</head>

<body>


    <header class="header">
        <nav style="height: fit-content;">
            <div class="logo">
                <img class="logorotate" src="../resources/img/logohobel.png" alt="" style="max-width: 150px;">
            </div>
            <div class="search">
                <input type="text" placeholder="Buscar servicios..." style="background-color: rgb(14, 158, 127);">
                <button type="submit" class="cta">Buscar</button>
            </div>
            <div class="menu">
                <ul>

                    <li><a href="../public/registro.php" class="cta">Registrarse</a></li>
                    <li><a href="../public/iniciar_sesion.php" class="cta" id="login">Acceder</a></li>
                </ul>
            </div>
        </nav>
        <!-- Ventana emergente de cookies-->

        <div id="cookies">
            <div class="cookies-content">
                <h2>Política de Cookies</h2>
                <p>Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Al continuar navegando por este
                    sitio, usted acepta nuestro uso de cookies. </p>
                    <p><a href="https://www.cookiepolicygenerator.com/live.php?token=oaN1UcL4pkt3NI4sPjFbTd24oHfhdAaS">Cookies Hobel</a></p>

                <button id="cookies-aceptar">Aceptar</button>
            </div>
        </div>


        <div class="textos-header">
           
                <div class="botones">
                    <button>
                        <img src="../resources/img/casa-icono.png" style="max-width: 500px; margin-right: 20px; margin-left: 0px;">
                        Hogar
                    </button>
                    <button>
                        <img src="../resources/img/deporte-icono.png" style="max-width: 500px; margin-right: 20px; margin-left: 0px;">
                        Deporte
                    </button>
                    <button>
                        <img src="../resources/img/clases-icono.png" style="max-width:500px; margin-right: 20px; margin-left: 0px;">
                        Clases
                    </button>
                    <button>
                        <img src="../resources/img/belleza-icono.png" style="max-width: 500px; margin-right: 20px; margin-left: 0px;">
                        Belleza
                    </button>
                    <button>
                        <img src="../resources/img/mascota-icono.png" style="max-width: 500px; margin-right: 20px; margin-left: 0px;">
                        Mascota
                    </button>
                    <button>
                        <img src="../resources/img/cuidados-icono.png" style="max-width: 500px; margin-right: 20px; margin-left: 0px;">
                        Cuidados
                    </button>
                </div>
          
           
            <br>
            <br>
            <br>

            <h1>Haz tu vida más fácil desde tu hogar</h1>
            <h2 style="text-align: center;">¿Necesitas un manitas? ¿Un profe de mates para tu hijo? ¿Un chef para la
                visita del sábado? ¿O mejor un
                cuidador para tu mascota?</h2>
            <br>
            <br>
            <p>Todos los servicios disponibles a tu alrededor</p>
            <a href="#contacto">Contacta</a>
        </div>
        <!-- Recurso online SVG wave generator -->
        <div class="svg-header" style="height: 250px; overflow: hidden;"><svg viewBox="0 0 500 150"
                preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-0.00,49.99 C149.89,149.99 352.68,-49.99 499.65,49.99 L499.65,149.99 L-0.00,149.99 Z"
                    style="stroke: none; fill: rgb(255, 255, 255);"></path>
            </svg></div>
    </header>


    <!-- Contenedor donde se encuentra el recurso de la ola y añadimos texto e imagen -->
    <section class="ola-contenedor website">


        <div class="contenedor-textos-main">

            <h2 class="parrafo">
                Si eres un profesional y quieres ayudar a miles de personas, no lo dudes, date de alta en Hobel y
                comienza a trabajar ya <br>¡Te esperan increíbles oportunidades!<br>
            </h2>


            <a href="registro.html" class="cta">HAZTE HOBEL</a>

        </div>
        <div class="divimg">
            <img src="../resources/img/Alta hobel.png" alt="">
        </div>

    </section>

    <!--  ubicaciones -->
    <section class="galeria">
        <div class="contenedor">
            <h3 class="titulo" style="text-align: center;">¿Dónde trabajamos?</h3>
            <article class="galeria-contenedor">
                <img src="../resources/img/malagalocation.webp" alt="">

                <img src="../resources/img/madridlocation.webp" alt="">
                <img src="../resources/img/barcelonalocation.webp" alt="">
                <img src="../resources/img/valencialocation.webp" alt="">
                <img src="../resources/img/bilbaolocation.webp" alt="">
                <img src="../resources/img/cadizlocation.webp" alt="">

            </article>
        </div>
    </section>
    <!-- Contenedor ultima sección de la página cursos privados -->
    <section class="info-last">
        <div class="contenedor last-section">
            <div class="contenedor-textos-main">
                <h2 class="titulo left" style="text-align: left;">Todos los profesionales a tu alcance</h2>
                <p class="parrafo">Disponemos de todos los servicios que puedas imaginar y más de 10000 usuarios confían en nuestros profesionales</p>
                
            </div>

            <img class="zoom" src="../resources/img/amigos.webp" alt="">



        </div>
        <!-- Recurso online svg wave generator (de https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections) -->
        <div class="svg-ola" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150"
                preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-0.00,49.99 C149.89,149.99 352.68,-49.99 499.65,49.99 L499.65,149.99 L-0.00,149.99 Z"
                    style="stroke: none; fill: #1ca083;"></path>
            </svg></div>
    </section>

    <!--Footer y formulario de contacto para más información -->

    <footer id="contacto">
        <div class="contenedor">
            <h2 class="titulo" style="color: azure;">Contáctanos</h2>
            <form action="" class="form" style="background-color: #1ca083ce;">
                <input type="text" name="" id="inputnombre" placeholder="Nombre">
                <input type="email" name="" id="inputemail" placeholder="Email">
                <textarea name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
                <input type="submit" value="Enviar" style="background-color: azure; color: black;">
            </form>
        </div>

        <!-- Nota al pie según LSSI y RGPD -->
     
        
        <!-- Aviso de privacidad -->
    

        <div class="privacidad">
            <a href="https://www.cookiepolicygenerator.com/live.php?token=SJsJNyfJCCVkpaHAkdwRIoVjJov35uAa"
            ">Política de privacidad</a>
          </div>
          <div class="nota-pie">
            <p>Este sitio web cumple con las normativas establecidas en la Ley de Servicios de la Sociedad de la Información y del Comercio Electrónico (LSSI) y en el Reglamento General de Protección de Datos (RGPD).</p>
          </div>

    </footer>

    <script src="registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
    



