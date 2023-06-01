<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Contratar Servicio</title>
</head>

<body>
    <?php require '../../util/control_acceso.php' ?>
    <?php require '../header.php' ?>
    <?php require '../../util/database.php' ?>


    <?php
    $error_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servicio_id = $_POST["servicio"];
        $cantidad = $_POST["cantidad"];
        $cliente_id = $_SESSION["cliente_id"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];

        // Validar fecha y hora
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

        if ($fecha < $currentDate || ($fecha == $currentDate && $hora <= $currentTime)) {
            $error_message = "La fecha y hora deben ser futuras.";
        } else {
            $sql = "INSERT INTO clientes_servicios
                    (cliente_id, servicio_id, cantidad, fecha, hora) 
                    VALUES 
                    ('$cliente_id', '$servicio_id', '$cantidad', '$fecha', '$hora')";

            if ($con->query($sql) == "TRUE") {
                echo "<p>Cita confirmada</p>";
            } else {
                echo "<p>Error al contratar servicio</p>";
            }
        }
    }
    ?>

    <div class="container">
        <h1>Contrata el servicio que más se adapte a tus necesidades</h1>

        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Servicio</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Día</th>
                            <th>Hora</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM servicios";
                        $resultado = $con->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                        ?>
                                <form action="" method="post" onsubmit="return validarFechaHora()">
                                    <tr>
                                        <td>
                                            <img width="50" height="60" src="../..<?php echo $row["imagen"] ?>">
                                        </td>
                                        <td><?php echo $row["nombre"] ?></td>
                                        <td><?php echo $row["descripcion"] ?></td>
                                        <td><?php echo $row["precio"] ?> €</td>
                                        <td>
                                            <select class="form-control" name="cantidad">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="form-group mb-3">
                                                <input class="form-control" type="date" name="fecha" id="fecha" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-3">
                                                <input class="form-control" type="time" name="hora" id="hora" required>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" name="servicio" value="<?php echo $row["id"] ?>">
                                            <button class="btn btn-success" type="submit">
                                                Comprar
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        function validarFechaHora() {
            var fechaInput = document.getElementById('fecha').value;
            var horaInput = document.getElementById('hora').value;

            var currentDate = new Date().toISOString().slice(0, 10);
            var currentTime = new Date().toLocaleTimeString('en-US', {
                hour12: false,
                hour: "numeric",
                minute: "numeric",
                second: "numeric"
            });

            if (fechaInput < currentDate || (fechaInput === currentDate && horaInput <= currentTime)) {
                var errorDiv = document.getElementById('error-message');
                errorDiv.innerText = 'La fecha y hora deben ser futuras.';
                errorDiv.style.display = 'block';
                return false;
            }

            return true;
        }
    </script>
</body>



</html>
