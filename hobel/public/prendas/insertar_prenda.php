<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar prenda</title>
</head>

<body>
    <!-- Respuesta al formulario-->
    <?php

    /*EJERCICIO
    - Elegir la talla con un select (XS, S, M, L, XL) (añadir check en la BD)
    - Categoría con select (Camisetas, Pantalones, Accesorios) (añadir check en la BD)*/
    require "../../util/database.php";
    require "../../util/control_acceso.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_nombre = depurar($_POST["nombre"]);
        $talla = $_POST["talla"];
        $temp_precio = depurar($_POST["precio"]);
        if (isset($_POST["categoria"])) {
            $categoria = $_POST["categoria"];
        } else {
            $categoria = "";
        }

        $file_name = $_FILES["imagen"]["name"];
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/images/prendas/" . $file_name;



        /**Aqui se completa categoria por lo que se inserta en la tabla la prenda con la categoria */
        $imagen = "/resources/images/prendas/" . $file_name;
        if (!empty($temp_nombre) && !empty($talla) && !empty($temp_precio)) {

            $err_nombre = "El nombre es obligatorio";


            //Subimos la imagen a la carpeta deseada
            if (move_uploaded_file($file_temp_name, $path)) {
                echo "<p>Fichero movido con exito</p>";
            } else {
                echo "<p>NO se ha podido mover el fichero</p>";
            }

            //Insertamos la prenda en la base de datos
            $imagen = "/resources/images/prendas/" . $file_name;
            if (!empty($categoria)) {
                $sql = "INSERT INTO prendas (nombre, talla, precio, categoria, imagen) 
                VALUES ('$temp_nombre','$talla','$temp_precio','$categoria','$imagen')";
            } else {
                //Aqui se inserta la prenda sin la categoria ya que no es obligatoria en la tabla
                $sql = "INSERT INTO prendas (nombre, talla, precio,imagen ) 
                VALUES ('$temp_nombre','$talla','$temp_precio','$imagen')";
            }


            if ($con->query($sql) == "TRUE") {

    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito!</strong> Prenda insertada correctamente
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

    <?php
            } else {
                echo "<p>Error al insertar la prenda</p>";
            }
        }
    }


    function depurar($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
    ?>


    <div class="container">
        <?php require '../header.php' ?>
        <h1>Nueva prenda</h1>
        <div class="row">
            <div class="col-6">

                <!--Formulario-->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                    </div>
            
                    <span class="error">
                        *<?php
                        if(isset($err_nombre)) echo $err_nombre;
                        ?>

                    </span>


                    <div class="form-group mb-3">
                        <select class="form-select" name="talla">Talla
                            <option selected>Selecciona una talla</option>
                            <option value="S">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>

                    </div>


                    <div class="form-group mb-3">
                        <select class="form-select" name="categoria">Categoría
                            <option value="" selected disabled hidden>Selecciona una categoría</option>
                            <option value="camisetas">Camisetas</option>
                            <option value="pantalones">Pantalones</option>
                            <option value="accesorios">Accesorios</option>

                        </select>



                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Precio</label>
                        <input class="form-control" type="text" name="precio">

                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Imagen</label>
                        <input class="form-control" type="file" name="imagen">
                    </div>


                    <button class="btn btn-primary mt-3" type="submit">Crear</button>
                    <a class="btn btn-secondary mt-3" href="index.php">Volver</a>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>