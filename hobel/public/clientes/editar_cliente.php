<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Cogemos la fuente Raleway de google fonts para nuestro css -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-XpHk9XNVIggnS6JNbuwPi+94PQdCrK4Ti4rqD4tPXm+lB1Hpl9fzq/t+jIToEAwGlFmboG5B1Z5c5Rfln0W8Ug=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="estilos.css">
    <title>Editar cliente</title>
</head>

<body>

    <?php
    require "../../util/control_acceso.php";
    ?>
    <?php require "../header.php"; ?>
    <?php
    require '../../util/database.php';



    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        $usuario = $_GET["usuario"];
        $email = $_GET["email"];
        $contrasena = $_GET["contrasena"];
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $fechaNacimiento = $_GET["fechaNacimiento"];
        $rol = $_GET["rol"];
        $direccion = $_GET["direccion"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $rol = $_POST["rol"];
        $direccion = $_POST["direccion"];

        $sql = "UPDATE clientes  SET usuario = '$usuario', 
                                    nombre = '$nombre',
                                    email = '$email',
                                    contrasena = '$contrasena',
                                    apellido = '$apellido',
                                    fechaNacimiento ='$fechaNacimiento',
                                    rol='$rol',
                                    direccion = '$direccion'
                                WHERE id = '$id'";

        if ($con->query($sql) == "TRUE") {
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Cliente modificado con éxito
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al modificar cliente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }
    ?>
    <div class="container">

        <h1>Editar cliente</h1>
        <div class="row">
            <div class="col-6">

                <!--Formulario-->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $email ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" type="password" name="contrasena" id="contrasena" value="<?php echo $contrasena ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Apellido</label>
                        <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $apellido ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $fechaNacimiento ?>">

                    </div>

                    <div class="form-group mb-3">

                        <select class="form-select" name="rol">Rol
                            <option selected value="<?php echo $rol ?>" hidden> <?php echo $rol ?></option>
                            <option value="administrador">Administrador</option>
                            <option value="usuario">Usuario</option>

                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Dirección</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $direccion ?>">
                    </div>


                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Editar</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
            <div class="col-2">
                <img width="600" height="500" src="../../resources/img/edit.png">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
<style>
        /* Estilos CSS para la tabla */
        h1 {
            padding: 20px;
            color:#fefefe;
            font-family: 'raleway', 'sans-serif';
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color:#fefefe;
            font-family: 'raleway', 'sans-serif';

        }
        .tabla-header {
            background-color:#0e7c61;
            color: #fefefe;
            
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        /* Estilos CSS para los botones */
        .btn {
            background-color:#0e7c61;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            font-family: 'raleway', 'sans-serif';
            font-size: 20px;
            margin-bottom: 30px;

        }
        
        .btn:hover {
            background-color:#35b293;
        }
        body {
            background: linear-gradient(to right, #35b293, #fefefe);
            margin: 0;
            padding: 0;
        }
        p {
            font-size: 20px;
            font-family: 'raleway', 'sans-serif';
            font-weight: bold;

        }
        label, input, select {
            font-size: 20px;
            font-family: 'raleway', 'sans-serif';
            font-weight: bold;
            color: #0e7c61;

        }
    

    </style>

</html>