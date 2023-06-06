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

    <title>Clientes index</title>
</head>

<body>
    <div>
    <?php require '../../util/control_acceso.php' ?>

<?php require '../../util/database.php' ?>
    <?php require '../header.php' ?>
    </div>
    <div class="container">
        <br>
        <h1>Listado de clientes</h1>

        <div class="row">
            <div class="col-20">
                <br>
                <a class="btn btn-warning" href="insertar_cliente.php">Nuevo cliente</a>
                <br><br>
                <table class="table table-striped table-hover no-margin-table">
                    <thead class="tabla-header">
                        <tr class="header-row">
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de nacimiento</th>
                            <th>Rol</th>
                            <th>Dirección</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php   //  Borrar prenda
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $_POST["id"];

                            //  Consulta para coger la ruta de la imagen y luego borrarla
                            /*$sql = "SELECT avatar FROM clientes WHERE id = '$id'";
                                $resultado = $conexion -> query($sql);
                                if ($resultado -> num_rows > 0) {
                                    while ($fila = $resultado -> fetch_assoc()) {
                                        $avatar = $fila["avatar"];
                                    }
                                    unlink("../.." . $avatar);
                                }*/

                            //  Consulta para borrar el cliente
                            $sql = "DELETE FROM clientes WHERE id = '$id'";

                            if ($con->query($sql)) {
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Se ha borrado el cliente
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Error al borrar el cliente
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <?php   //  Seleccionar todos los clientes
                        $sql = "SELECT * FROM clientes";
                        $resultado = $con->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $id = $row["id"];
                                $usuario = $row["usuario"];
                                $email = $row["email"];
                                $nombre = $row["nombre"];
                                $apellido = $row["apellido"];
                                $fechaNacimiento = $row["fechaNacimiento"];
                                $rol = $row["rol"];
                                $direccion = $row["direccion"];
                                //$avatar = $fila["avatar"];
                        ?>
                                <tr>
                                    <td><?php echo $usuario ?></td>
                                    <!--<td>
                                            <img width="50" height="60" src="../..<?/*php echo $avatar*/ ?>">
                                        </td>-->
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $apellido ?></td>
                                    <td><?php echo $fechaNacimiento ?></td>
                                    <td><?php echo $rol ?></td>
                                    <td><?php echo $direccion ?></td>

                                    <td>
                                        <form action="mostrar_cliente.php" method="get">
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
                <img width="200" heigth="200" src="../../resources/images/ropa.jpg">
            </div> -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>


</body>
<style>
        /* Estilos CSS para la tabla */
        h1 {
            padding: 20px;
            color:#fefefe;
            font-family: 'raleway', 'sans-serif';
        }
        table {
            border-radius: 10px;
            width: 100%;
            background-color:#fefefe;
            font-family: 'raleway', 'sans-serif';
            


        }
        .tabla-header {
            background-color:#0e7c61;
            color: #fefefe;
            height: 50px; /* Ajusta la altura de las filas según tus necesidades */

            
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr.header-row {
        height: auto; /* Establece la altura automática para la fila del encabezado */
        }
        tr {
        height: 100px; /* Ajusta la altura de las filas según tus necesidades */
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

        }
        
        .btn:hover {
            background-color:#35b293;
        }
        body {
            background: linear-gradient(to right, #35b293, #fefefe);
            margin: 0;
            padding: 0;
        }
    </style>

</html>