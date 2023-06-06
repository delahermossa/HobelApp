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
    <title>Mis citas</title>
</head>

<body>
    <div>
    <?php
        require "../../util/control_acceso.php";
        ?>
        <?php require '../header.php' ?>
        <?php require '../../util/database.php' ?>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //$usuario = $_GET["usuario"];
           
            $usuario= $_SESSION["usuario"];
         
        }
        ?>
    </div>

    <div class="container">
       

        <br>
        <h1>Citas de <?php echo $usuario ?></h1> 
        
        <br>
        <div class="row">
            <div class="col-20">
                <table class="table table-striped table-hover no-margin-table">
                    <thead class="tabla-header">
                        <tr class="header-row">
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                            <th>Fecha</th>
                            <th>Hora</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vw_clientes_servicios
                                    WHERE usuario = '$usuario'";

                        $resultado = $con->query($sql);
                        $precio_total = 0;

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $servicio = $row["servicio"];
                                $cantidad = $row["cantidad"];
                                $precio_unitario = $row["precio_unitario"];
                                $fecha = $row["fecha"];
                                $hora = $row["hora"];
                                $precio_total += ($precio_unitario * $cantidad);
                        ?>
                                <tr>
                                    <td><?php echo $servicio ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $precio_unitario ?></td>
                                    <td><?php echo $precio_unitario * $cantidad ?></td>
                                    <td><?php echo $fecha ?></td>
                                    <td><?php echo $hora ?></td>

                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <h4><span class="total-price">Total: <?php echo $precio_total ?>€</span></h4>
            </div>
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
            border-collapse: collapse;
            width: 100%;
            background-color:#fefefe;
            font-family: 'raleway', 'sans-serif';
            font-size: 20px;


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
        .total-price {
            /* Estilos personalizados para el elemento .total-price */
            background-color: #0e7c61;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            font-family: 'raleway', 'sans-serif';

            }
    </style>

</html>