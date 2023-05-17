<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar cliente</title>
</head>

<body>
    <?php
    require "../../util/control_acceso.php";
    ?>
    <?php require "../../util/database.php" ?>
    <?php require "../header.php" ?>

    <h1>Ver cliente</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = "SELECT * FROM clientes WHERE id = '$id'";

        $resultado = $con->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $usuario = $row["usuario"];
                $contrasena = $row["contrasena"];
                $nombre = $row["nombre"];
                $apellido1 = $row["apellido1"];
                $apellido2= $row["apellido2"];
                $fechaNacimiento= $row["fechaNacimiento"];
                $rol = $row["rol"];


            }
        }
    }
    ?>


    <div class="container">
        <div class="row">
            <div class="col-4">
                <p>Usuario: <?php echo $usuario ?></p>
                <p>Contraseña: <?php echo $contrasena ?></p>
                <p>Nombre: <?php echo $nombre ?></p>
                <p>Apellido 1: <?php echo $apellido1 ?></p>
                <p>Apellido 2: <?php echo $apellido2 ?></p>
                <p>Fecha nacimiento: <?php echo $fechaNacimiento ?></p>
                <p>Rol: <?php echo $rol ?></p>


                <form action="editar_cliente.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="usuario" value="<?php echo $usuario ?>">
                    <input type="hidden" name="contrasena" value="<?php echo $contrasena ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="apellido1" value="<?php echo $apellido1 ?>">
                    <input type="hidden" name="apellido2" value="<?php echo $apellido2 ?>">
                    <input type="hidden" name="fechaNacimiento" value="<?php echo $fechaNacimiento ?>">
                    <input type="hidden" name="rol" value="<?php echo $rol ?>">



                    <a class="btn btn-secondary" href="index.php">Volver</a>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
            <div class="col-4">
                <img witdh="600" height="500" src="../..<?php echo $imagen ?>">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>