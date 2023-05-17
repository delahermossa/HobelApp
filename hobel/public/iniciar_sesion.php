<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Inicio sesion</title>
</head>

<body>

    
    <?php
    require '../util/database.php';
   
    ?>
    
   


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT *FROM clientes where usuario ='$usuario'";
        $resultado = $con->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $hash_contrasena = $row["contrasena"];
                $id=$row["id"];
                $rol=$row["rol"];
            }
            $acceso_valido =
                password_verify($contrasena, $hash_contrasena);

                if($acceso_valido==TRUE){
                    echo "<h2>ACCESO VALIDO!</h2>";

                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    $_SESSION["rol"]=$rol;
                    $_SESSION["cliente_id"]=$id;


                    header('location:index.php');
                }else{
                    echo "<h2>CONTRASEÑA INVALIDA</h2>";
                }
        }
    }
    ?>

    <div class="container">
        <h1>Inicia sesion</h1>

        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" name="usuario" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" name="contrasena" type="password">
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Iniciar</button>
                    </div>

                    <div class="form-group mb-3">
                    <a class="btn btn-secondary mt-3" href="../public/registro.php">Registrarse</a>                        
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>