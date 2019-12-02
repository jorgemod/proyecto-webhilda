<?php
include("conexion.php");
$nombre = $_POST['nombrecliente'];
$telefono = $_POST['telefonocliente'];
$contraseña = $_POST['contraseña'];
$sql = "INSERT INTO cliente(nombre_cliente,telefono_cliente,password)VALUES('$nombre','$telefono','$contraseña')";
if(mysqli_query($db,$sql))
{
    echo "agregado con exito";
    include("addcliente.php");
}
else {
    echo "error al agregar";

}

//echo $nombre . ' ' . $telefono . ' '. $contraseña;
