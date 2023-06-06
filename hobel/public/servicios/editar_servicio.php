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
    <title>Editar Servicio</title>
</head>

<body>
<?php
    require "../../util/control_acceso.php";
?>

<?php
    require '../../util/database.php';

    $error = '';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        $nombre = $_GET["nombre"];
        $descripcion = $_GET["descripcion"];
        $categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : '';
        $precio = $_GET["precio"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : '';
        $precio = $_POST["precio"];

        if (empty($nombre) || empty($descripcion) || empty($categoria) || empty($precio)) {
            $error = "Por favor, complete todos los campos.";
        } else {
            $sql = "UPDATE servicios SET nombre = '$nombre', 
                                        descripcion = '$descripcion',
                                        categoria = '$categoria',
                                        precio = '$precio'
                                    WHERE id = '$id'";

            if ($con->query($sql) === TRUE) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Servicio modificado con éxito
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al modificar
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
        }
    }
?>
<div class="container">
    <h1>Editar servicio</h1>
    <div class="row">
        <div class="col-6">
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Descripción</label>
                    <input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria">
                        <option value="<?php echo $categoria ?>" selected hidden><?php echo ucfirst(strtolower($categoria)) ?></option>
                        <option value="" selected disabled hidden>Selecciona una categoría</option>
                        <option value="limpieza">Limpieza</option>
                        <option value="manitas">Manitas</option>
                        <option value="chef">Chef</option>
                        <option value="entrenador">Entrenador personal</option>
                        <option value="profesor_padel">Profesor de padel</option>
                        <option value="profesor_matematicas">Profesor de matemáticas</option>
                        <option value="profesor_lengua">Profesor de lengua</option>
                        <option value="peluqueria">Peluquería</option>
                        <option value="manicura">Manicura</option>
                        <option value="ciudado_mascotas">Cuidado de mascotas</option>
                        <option value="ciudado_ancianos">Cuidado de ancianos</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Precio</label>
                    <input class="form-control" type="text" name="precio" value="<?php echo $precio ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button class="btn btn-primary" type="submit">Editar</button>
                <a class="btn btn-secondary" href="index.php">Volver</a>
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