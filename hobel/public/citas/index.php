<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Citas</title>
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
        <h1>Servicios contratados</h1>

        <div class="row">
            <div class="col-20">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Servicio</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Fecha</th>
                            <th>Hora</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vw_clientes_servicios";
                        $resultado = $con->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $usuario = $row["usuario"];
                                $producto = $row["servicio"];
                                $cantidad = $row["cantidad"];
                                $precio_unitario = $row["precio_unitario"];
                                $fecha = $row["fecha"];
                                $hora = $row["hora"];

                        ?>
                                <tr>
                                    <td><a href="./cliente_citas.php?usuario=<?php echo $usuario ?>"><?php echo $usuario ?></a></td>
                                    <td><?php echo $producto ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $precio_unitario ?></td>
                                    <td><?php echo $fecha ?></td>
                                    <td><?php echo $hora ?></td>

                                </tr>
                        <?php

                                /*  CUANDO SE PULSE EN UN USUARIO
                                    SE MOSTRARÁN LAS COMPRAS DE ESE
                                    USUARIO Y EL TOTAL QUE HA GASTADO
                                    (EN UN FICHERO NUEVO)
                                */
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>