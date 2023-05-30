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

    <title>Servicios Index</title>
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
        <h1>Listado de servicios</h1>
        <a class="btn btn-info mb-3" href="insertar_servicio.php">Nuevo servicio</a>

        <div class="row">
            <div class="col-20">
                <table class="table table-striped table-hover no-margin-table">
                    <thead class="table-info">
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>

                        </tr>

                    </thead>
                    <tbody>


                        <?php  
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $_POST["id"];

                            //  Consulta para coger la ruta de la imagen y luego borrarla
                            $sql = "SELECT imagen FROM servicios WHERE id = '$id'";
                            $resultado = $con->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_assoc()) {
                                    $imagen = $row["imagen"];
                                }
                                unlink("../.." . $imagen);
                            }

                            //  Consulta para borrar la prenda
                            $sql = "DELETE FROM servicios WHERE id = '$id'";

                            if ($con->query($sql)) {
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Se ha borrado el servicio
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                        <?php
                            } else {
                                echo "<p>Error al borrar</p>";
                            }
                        }
                        ?>
                        <?php 

                        $sql = "SELECT*FROM servicios";
                        $resultado = $con->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $nombre = $row["nombre"];
                                $descripcion = $row["descripcion"];
                                $categoria = $row["categoria"];
                                $precio = $row["precio"];
                                $imagen = $row["imagen"];

                        ?>
                                <tr>
                                    <td><img width="50" height="60" src="../..<?php echo $imagen ?>"></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $descripcion ?></td>
                                    <td><?php echo $categoria ?></td>
                                    <td><?php echo $precio . '€'?></td>


                                    <td>
                                        <form action="./mostrar_servicio.php" method="get">
                                            <button class="btn btn-info" type="submit">Ver</button>
                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                        </form>
                                    </td>

                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-warning" type="submit">Borrar</button>
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
            <!-- <div class="col-3">
                <img width="300" height="300" src="../../resources/ropa.jpg" alt="">

            </div> -->
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>