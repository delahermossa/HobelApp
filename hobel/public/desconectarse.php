<?php
session_start();
session_destroy();
header("location: http://localhost/hobelapp/HobelApp/hobel/public/iniciar_sesion.php");


?>