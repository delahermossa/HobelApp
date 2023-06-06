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
            echo "
            <div class='modal fade' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content success-modal'>
                        <div class='modal-body'>
                            <i class='fas fa-check-circle success-icon'></i>
                            <h5 class='modal-title' id='successModalLabel'>Cita confirmada</h5>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            ";

    // Script para mostrar la modal de confirmación
            echo "
            <script>
                $(document).ready(function() {
                    $('#successModal').modal('show');
                });
            </script>
            ";
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

        <div class="service-info">
            <div class="col-20">
                <table class="table">
                    <thead>
                        <tr class="header-row">
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
                                                Agendar
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
        // Mostrar la modal de confirmación
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>
</body>

<style>
        /* Estilos CSS para la tabla */
        h1 {
            margin-top: 20px;
            padding: 20px;
            color:#0e7c61;
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
        margin-top: 45px;
        margin-bottom: 20px;
        }
        .success-modal {
            text-align: center;
        }

        .success-icon {
            color: #28a745;
            font-size: 5rem;
            margin-bottom: 1rem;
        }
        

    </style>

</html>
