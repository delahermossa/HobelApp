<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendas Index</title>
</head>

<body>

<?php
    require "../../util/control_acceso.php";
    ?>
    <?php
    require "../header.php";
    ?>
    <?php
    require "../../util/database.php";
    ?>


    <div class="container">
        <h1>Listado de prendas</h1>
        <a class="btn btn-primary mb-3" href="insertar_prenda.php">Nueva prenda</a>

        <div class="row">
            <div class="col-9">
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                            <th></th>
                           


                        </tr>

                    </thead>
                    <tbody>


                        <?php   //  Borrar prenda
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $_POST["id"];

                            //  Consulta para coger la ruta de la imagen y luego borrarla
                            $sql = "SELECT imagen FROM prendas WHERE id = '$id'";
                            $resultado = $con->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_assoc()) {
                                    $imagen = $row["imagen"];
                                }
                                unlink("../.." . $imagen);
                            }

                            //  Consulta para borrar la prenda
                            $sql = "DELETE FROM prendas WHERE id = '$id'";

                            if ($con->query($sql)) {
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Se ha borrado la prenda
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                        <?php
                            } else {
                                echo "<p>Error al borrar</p>";
                            }
                        }
                        ?>
                        <?php //Seleccionar todas las prendas

                        $sql = "SELECT*FROM prendas";
                        $resultado = $con->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $nombre = $row["nombre"];
                                $talla = $row["talla"];
                                $categoria = $row["categoria"];
                                $precio = $row["precio"];
                                $imagen = $row["imagen"];

                        ?>
                                <tr>

                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $talla ?></td>
                                    <td><?php echo $categoria ?></td>
                                    <td><?php echo $precio ?></td>
                                    <td><img width="50" height="60" src="../..<?php echo $imagen ?>"></td>





                                    <td>
                                        <form action="./mostrar_prenda.php" method="get">
                                            <button class="btn btn-secondary" type="submit">Ver</button>
                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                        </form>
                                    </td>

                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-danger" type="submit">Borrar</button>
                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">

                                        </form>

                                    </td>


                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <img width="300" height="300" src="../../resources/ropa.jpg" alt="">

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>