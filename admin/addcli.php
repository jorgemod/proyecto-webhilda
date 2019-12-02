<?php
include("conexion.php");
$nombre = $_POST['nombrecliente'];
$telefono = $_POST['telefonocliente'];
$contraseña = $_POST['contraseña'];

echo $nombre . ' ' . $telefono . ' '. $contraseña;
