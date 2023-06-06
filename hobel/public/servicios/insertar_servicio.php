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
    <title>Insertar servicio</title>
</head>

<body>
    <!-- Respuesta al formulario-->
    <?php
    require "../../util/database.php";
    require "../../util/control_acceso.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_nombre = depurar($_POST["nombre"]);
        $descripcion = $_POST["descripcion"];
        $temp_precio = depurar($_POST["precio"]);
        if (isset($_POST["categoria"])) {
            $categoria = $_POST["categoria"];
        } else {
            $categoria = "";
        }

        $file_name = $_FILES["imagen"]["name"];
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/images/servicios/" . $file_name;



        /**Aqui se completa categoria por lo que se inserta en la tabla la servicios con la categoria */
        $imagen = "/resources/images/servicios/" . $file_name;
        if (!empty($temp_nombre) && !empty($descripcion) && !empty($temp_precio)) {

            $err_nombre = "El nombre es obligatorio";


            //Subimos la imagen a la carpeta deseada
            if (move_uploaded_file($file_temp_name, $path)) {
                echo "";
            } else {
                echo "<p>NO se ha podido mover el fichero</p>";
            }

            //Insertamos la prenda en la base de datos
            $imagen = "/resources/images/servicios/" . $file_name;
            if (!empty($categoria)) {
                $sql = "INSERT INTO servicios (nombre, descripcion, categoria, precio, imagen) 
                VALUES ('$temp_nombre','$descripcion','$categoria','$temp_precio','$imagen')";
            } else {
                $sql = "INSERT INTO servicios (nombre, descripcion, precio,imagen ) 
                VALUES ('$temp_nombre','$descripcion','$temp_precio','$imagen')";
            }


            if ($con->query($sql) == "TRUE") {

    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito!</strong> Servicio insertado correctamente
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

    <?php
            } else {
                echo "<p>Error al insertar el servicio</p>";
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

<?php require '../header.php' ?>
    <div class="container">
        
        <h1>Nuevo servicio</h1>
        <div class="row">
            <div class="col-6">

                <!--Formulario-->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                    </div>
            
                    <span class="error">
                        <?php
                        if(isset($err_nombre)) echo $err_nombre;
                        ?>

                    </span>


                    <div class="form-group mb-3">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" type="text" name="descripcion">
                    </div>


                    <div class="form-group mb-3">
                        <select class="form-select" name="categoria">Categoría
                            <option value="" selected disabled hidden>Selecciona una categoría</option>
                            <option value="limpieza">Limpieza</option>
                            <option value="manitas ">Manitas</option>
                            <option value="chef ">Chef</option>
                            <option value="entrenador">Entrenador personal</option>
                            <option value="profesor_padel">Profesor de padel</option>
                            <option value="profesor_matematicas">Profesor de matemáticas</option>
                            <option value="profesor_lengua">Profesor de lengua</option>
                            <option value="peluqueria">Peluquería</option>
                            <option value="peluqueria">Peluquería</option>
                            <option value="manicura">Manicura</option>
                            <option value="ciudado_mascotas">Cuidado de mascotas</option>
                            <option value="ciudado_mascotas">Peluquería de mascotas</option>
                            <option value="ciudado_ancianos">Cuidado de niños</option>

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


                    <button class="btn btn-info mt-3" type="submit">Crear</button>
                    <a class="btn btn-warning mt-3" href="index.php">Volver</a>

                </form>

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