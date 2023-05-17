<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("location: http://localhost/HobelApp/HobelApp/hobel/public/iniciar_sesion.php");
}

?>