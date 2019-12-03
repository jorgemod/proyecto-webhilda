<?php
include("conexion.php");
$fecha_actual = date("Y-m-d");
$precio_unitario = $_POST['precioUnitario'];
$cantidad = $_POST['cantidad'];
$id_cliente = $_POST['idCliente'];

$id_producto = $_POST['idProducto'];
$marca = $_POST['marca'];

echo $fecha_actual . " - " . $precio_unitario . " - " . $cantidad . " - " . $id_cliente . " - " . $id_producto . " - " . $marca;

$sql = "INSERT INTO pedidos (fecha_pedido, precio_unitario, cantidad, id_cliente) VALUES ('$fecha_actual','$precio_unitario','$cantidad','$id_cliente')";

if(mysqli_query($db, $sql))
{    
    include("dash.html");
}
else {
    echo "error al agregar pedido";
}

$sql = "INSERT INTO productos (id_producto, marca, precio) VALUES ('$id_producto','$marca','$precio_unitario')";

if(mysqli_query($db, $sql))
{    
    include("dash.html");
}
else {
    echo "error al agregar producto";
}

?>