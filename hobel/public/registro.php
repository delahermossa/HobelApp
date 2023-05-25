<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar_cliente</title>
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
    <?php
    require "../util/database.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $rol = $_POST["rol"];


        /**Aqui se completa categoria por lo que se inserta en la tabla el cliente con el segundo apellido */
        if (
            !empty($usuario) && !empty($nombre) && !empty($contrasena) &&
            !empty($apellido1) &&
            !empty($fechaNacimiento) &&
            !empty($rol)
        ) {



            $apellido2 = !empty($apellido2) ? "'$apellido2'" : "NULL";

            $sql = "INSERT INTO clientes (usuario, contrasena, nombre, apellido1, apellido2, fechaNacimiento,rol) 
            VALUES ('$usuario','$hash_contrasena','$nombre','$apellido1',$apellido2,'$fechaNacimiento','$rol')";



            if ($con->query($sql) == "TRUE") {
    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito!</strong> Cliente insertado correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Error!</strong> No se ha podido insertar la prenda.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
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
    
               <div class="row">
            <div class="col-6">

                <!--Formulario-->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" type="text" name="usuario" id="usuario">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" type="password" name="contrasena" id="contrasena">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Primer apellido</label>
                        <input class="form-control" type="text" name="apellido1" id="apellido1">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Segundo apellido</label>
                        <input class="form-control" type="text" name="apellido2" id="apellido2">
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento">

                    </div>

                    <div class="form-group mb-3">
                        <select class="form-select" name="rol">Rol
                            <option selected disabled hidden>Selecciona el rol</option>
                            <option value="administrador">Administrador</option>
                            <option value="usuario">Usuario</option>

                        </select>

                    </div>





                    <button class="btn btn-primary mt-3" type="submit" name="btnCrear">Registrarse</button>
                    <a class="btn btn-secondary mt-3" href="index.php">Volver</a>

                </form>

            </div>

        </div>

    </div>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>