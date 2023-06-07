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
    <title>Mostrar cliente</title>
</head>

<body>
    <?php
    require "../../util/control_acceso.php";
    ?>
    <?php require "../../util/database.php" ?>
    <?php require "../header.php" ?>

    

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = "SELECT * FROM clientes WHERE id = '$id'";

        $resultado = $con->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $usuario = $row["usuario"];
                $email = $row["email"];
                $contrasena = $row["contrasena"];
                $nombre = $row["nombre"];
                $apellido = $row["apellido"];
                $fechaNacimiento= $row["fechaNacimiento"];
                $rol = $row["rol"];
                $direccion= $row["direccion"];
            }
        }
    }
    ?>


    <div class="container">
    <h1>Cliente</h1>
        <div class="row">
            <div class="service-info">
                <p>Usuario: <?php echo $usuario ?></p>
                <p>Email: <?php echo $email ?></p>
                <p>Nombre: <?php echo $nombre ?></p>
                <p>Apellido: <?php echo $apellido ?></p>
                <p>Fecha nacimiento: <?php echo $fechaNacimiento ?></p>
                <p>Rol: <?php echo $rol ?></p>
                <p>Dirección: <?php echo $direccion ?></p>

                <form action="editar_cliente.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="usuario" value="<?php echo $usuario ?>">
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <input type="hidden" name="contrasena" value="<?php echo $contrasena ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="apellido" value="<?php echo $apellido ?>">
                    <input type="hidden" name="fechaNacimiento" value="<?php echo $fechaNacimiento ?>">
                    <input type="hidden" name="rol" value="<?php echo $rol ?>">
                    <input type="hidden" name="direccion" value="<?php echo $direccion ?>">


                    <a class="btn btn-secondary" href="index.php">Volver</a>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
            <div class="col-2">
                <img width="600" height="500" src="../../resources/img/cliente.png">
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
            margin-top: 30px;
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

        }
        label, input, select {
            font-size: 20px;
            font-family: 'raleway', 'sans-serif';
            font-weight: bold;
            color: #0e7c61;

        }
        .service-info {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            max-width: 50%;
            
            }
        

    </style>

</html>