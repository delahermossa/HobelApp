<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Editar Servicio</title>
</head>

<body>
<?php
    require "../../util/control_acceso.php";
    ?>

    <?php
    require '../../util/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        $nombre = $_GET["nombre"];
        $talla = $_GET["talla"];
        $precio = $_GET["precio"];
        $categoria = $_GET["categoria"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $talla = $_POST["talla"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];

        $sql = "UPDATE prendas  SET  nombre = '$nombre', 
                                    talla = '$talla',
                                    precio = '$precio',
                                    categoria = '$categoria'
                                WHERE id = '$id'";

        if ($con->query($sql) == "TRUE") {
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Prenda modificada con éxito
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al modificar la prenda
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }
    ?>
    <div class="container">
        <h1>Editar prenda</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Talla</label>
                        <select class="form-select" name="talla">
                            <option value="<?php echo $talla ?>" selected hidden><?php echo $talla ?></option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Precio</label>
                        <input class="form-control" type="text" name="precio" value="<?php echo $precio ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Categoría</label>
                        <select class="form-select" name="categoria">
                            <option value="<?php echo $categoria ?>" selected hidden><?php echo ucfirst(strtolower($categoria)) ?></option>
                            <option value="CAMISETAS">Camisetas</option>
                            <option value="PANTALONES">Pantalones</option>
                            <option value="ACCESORIOS">Accesorios</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Editar</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>