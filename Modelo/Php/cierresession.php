<?php 
session_start();
session_destroy();
header('location: /ProyectoNutricional/Vista/Html/login.php');
die();

?>