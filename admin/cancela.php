<?php
include("conexion.php");
$idcancelado = $_POST['id_pedido'];
//echo $idcancelado;
$sql = "UPDATE pedidos SET estado_pedido = 'cancelado' WHERE pedidos.id_pedido = $idcancelado";
if(mysqli_query($db, $sql))
{
    echo 'producto cancelado';
    sleep(3);
    header("location: dash.html");
}
else {
    echo 'no se pudo cancelar';
}