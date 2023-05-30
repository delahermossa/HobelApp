<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar servicio</title>
</head>

<body>
    <?php
    require "../../util/control_acceso.php";
    ?>
    <?php require "../../util/database.php" ?>
    <?php require "../header.php" ?>

    <h1>Ver servicio</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = "SELECT * FROM servicios WHERE id = '$id'";

        $resultado = $con->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $nombre = $row["nombre"];
                $descripcion = $row["descripcion"];
                $categoria = $row["categoria"];
                $precio = $row["precio"];
                $imagen = $row["imagen"];
            }
        }
    }
    ?>


    <div class="container">
        <div class="row">
            <div class="col-4">
                <p>Nombre: <?php echo $nombre ?></p>
                <p>Descripcion: <?php echo $descripcion ?></p>
                <p>Categoría: <?php echo $categoria ?></p>
                <p>Precio: <?php echo $precio ?></p>
                
                <form action="editar_servicio.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $descripcion ?>">
                    <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                    <a class="btn btn-info" href="index.php">Volver</a>
                    <button type="submit" class="btn btn-warning">Editar</button>
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