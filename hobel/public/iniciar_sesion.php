<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <!-- Cogemos la fuente Raleway de google fonts para nuestro css -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-XpHk9XNVIggnS6JNbuwPi+94PQdCrK4Ti4rqD4tPXm+lB1Hpl9fzq/t+jIToEAwGlFmboG5B1Z5c5Rfln0W8Ug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="estilos.css">
    <title>Inicio sesion</title>
</head>

<body>
    
<?php
require '../util/database.php';
$usuarioError = $contrasenaError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usuario"])) {
        $usuarioError = "Por favor, ingresa un usuario";
    } else {
        $usuario = $_POST["usuario"];
    }

    if (empty($_POST["contrasena"])) {
        $contrasenaError = "Por favor, ingresa una contraseña";
    } else {
        $contrasena = $_POST["contrasena"];
    }

    if (!empty($usuario) && !empty($contrasena)) {
        $sql = "SELECT * FROM clientes WHERE usuario = '$usuario'";
        $resultado = $con->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $hash_contrasena = $row["contrasena"];
                $id = $row["id"];
                $rol = $row["rol"];
            }
            $acceso_valido = password_verify($contrasena, $hash_contrasena);

            if ($acceso_valido) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ¡ACCESO VÁLIDO!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["rol"] = $rol;
                $_SESSION["cliente_id"] = $id;

                header('location:index.php');
                exit;
            } else {
                $mensajeError = "Contraseña inválida";
            }
        } else {
            $mensajeError = "Usuario no encontrado";
        }
    }
}
?>
     <header class="headerregistro">
        <nav style="height: fit-content;">
            <div class="logo">
                <img class="logorotate" src="../resources/img/logohobel.png" alt="" style="max-width: 150px;">
            </div>
            <div class="search">
                <input type="text" placeholder="Buscar servicios..." style="background-color: lightslategrey;">
                <button type="submit" class="cta">Buscar</button>
            </div>
            <div class="menu">
                <ul>

                    <li><a href="index.html" class="cta" style="color: white;">Acceder</a></li>
                </ul>
            </div>
        </nav>

    <div class="container">
        <h1>   </h1>

        <div class="formularioregistro" id="formularioregistro">
            <div class="col-20">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <span class="text-danger"><?php echo $usuarioError; ?></span>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <span class="text-danger"><?php echo $contrasenaError; ?></span>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary" type="submit">Iniciar</button>
            </div>
            <div class="form-group mb-3">
                <a class="btn btn-secondary mt-3" href="../public/registro.php">Registrarse</a>
            </div>
            <?php if (isset($mensajeError)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $mensajeError; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        </form>
               
            </div>
        </div>
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

   

</section>
</section>
     <!--  ubicaciones -->
     <section class="galeria-iniciosesion">
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
                <p class="parrafo">Disponemos de todos los servicios que puedas imaginar y m
            </div>

            <img class="" src="../resources/img/amigos.webp" alt="">



        </div>
        <!-- Recurso online svg wave generator (de https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections) -->
        <div class="svg-ola" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150"
                preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-0.00,49.99 C149.89,149.99 352.68,-49.99 499.65,49.99 L499.65,149.99 L-0.00,149.99 Z"
                    style="stroke: none; fill: #21895bd3;"></path>
            </svg></div>
    </section>
    <footer>
        
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