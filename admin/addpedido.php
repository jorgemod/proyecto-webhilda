<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../login.html");
}
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'sistema_web');
$conexion = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($conexion == false) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id_cliente, nombre_cliente FROM cliente";
$clientes = $conexion->query($sql);
$hayClientes = false;

if ($clientes->num_rows > 0) {
    $hayClientes = true;
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="addpedido.css">
    <title>Agregar pedido</title>
    <style>
        label,
        select {
            font-family: Arial, Helvetica, sans-serif;
            display: block;

        }

        label {
            margin-top: 15px;
            color: white;
            font-size: 19pt;
        }

        select {
            font-size: 11pt;
            width: 300px;
            height: 60px; 
        }
    </style>
</head>

<body>
    <h1>Nuevo pedido</h1>
    <div>
        <form action="addped.php" method="post">
            <label for="idCliente">Id del cliente:</label>
            <select name="idCliente" id="idCliente">
            <option value='' disabled selected>Selecciona un cliente:</option>

                <?php

                if ($hayClientes) {
                    while ($clientes_registro = $clientes->fetch_assoc()) {
                        $id_cliente = $clientes_registro["id_cliente"];
                        $nombre_cliente = $clientes_registro["nombre_cliente"];

                        echo "<option value=\"" . $id_cliente . "\">" . $id_cliente . " - " . $nombre_cliente . "</option>";
                    }
                }
                ?>
            </select>
            <label for="marca">Marca:</label>
            <select name="marca" id="marca">
                <option value="avon">Avon</option>
                <option value="betterware">Betterware</option>
                <option value="betterstyle">Betterstyle</option>
            </select>
            <label for="precioUnitario">Precio unitario:</label>
            <input type="text" name="precioUnitario" id="precioUnitario">
            <label for="cantidad">Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad">
            <label for="foto">Foto:</label>
            <input type="text" name="foto" id="foto">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="productoDescripcion" id="productoDescripcion">

            <input class="button" type="submit">
        </form>
    </div>
</body>

</html>