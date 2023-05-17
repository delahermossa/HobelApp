<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar_cliente</title>
</head>

<body>
    <?php
    require "../../util/control_acceso.php";
    require "../../util/database.php";
    require "../header.php";


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

    <div class="container">
       
        <h1>Nuevo cliente</h1>
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





                    <button class="btn btn-primary mt-3" type="submit" name="btnCrear">Crear</button>
                    <a class="btn btn-secondary mt-3" href="index.php">Volver</a>

                </form>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>