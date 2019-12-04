<?php
include("conexion.php");
function randomGen($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
$fecha_actual = date("Y-m-d");
$precio_unitario = $_POST['precioUnitario'];
$cantidad = $_POST['cantidad'];
$id_cliente = $_POST['idCliente'];
$foto_url = $_POST['foto'];

$id_producto = randomGen(10090, 200000, 1)[0];
$marca = $_POST['marca'];
$descripcion = $_POST['productoDescripcion'];

//echo $fecha_actual . " - " . $precio_unitario . " - " . $cantidad . " - " . $id_cliente . " - " . $id_producto . " - " . $marca;

$sql = "INSERT INTO pedidos (fecha_pedido, precio_unitario, cantidad, id_cliente) VALUES ('$fecha_actual','$precio_unitario','$cantidad','$id_cliente')";
if (mysqli_query($db, $sql)) {
    //include("dash.html");
} else {
    echo "error al agregar pedido";
}

$sql = "INSERT INTO productos (id_producto, marca, precio, foto_url, descripcion) VALUES ('$id_producto','$marca','$precio_unitario', '$foto_url', '$descripcion')";
if (mysqli_query($db, $sql)) {
    //include("dash.html");
} else {
    echo "error al agregar producto";
}

$id_pedido = 0;
$sql = "SELECT id_pedido FROM pedidos ORDER BY id_pedido DESC LIMIT 1";
if ($resultado = mysqli_query($db, $sql)) {
    $registro = mysqli_fetch_array($resultado);
    $id_pedido = $registro["id_pedido"];
    //echo $id_pedido;
    //include("dash.html");
} else {
    echo "error al seleccionar id_pedido";
}

$sql = "INSERT INTO pedidos_productos (id_pedido, id_producto) VALUES ('$id_pedido','$id_producto')";
if (mysqli_query($db, $sql)) {
    include("dash.html");
} else {
    echo "error al insertar en pedidos_productos";
}
