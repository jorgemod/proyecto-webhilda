<?php
session_start();
include('conexion.php');
if (!isset($_SESSION['id'])) {
    header("location: ../login.html");
}

$sql = "SELECT id_cliente, nombre_cliente FROM cliente";
$clientes = $db->query($sql);
$hayClientes = false;

if ($clientes->num_rows > 0) {
    $hayClientes = true;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dash.css">
    <title>Inicio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#idCliente').change(function() {
                var inputValue = $(this).val();
                $.post('consulta.php', {
                    dropdownValue: inputValue
                }, function(data) {
                    var sel = document.getElementById("idPedido");
                    sel.removeAttribute("disabled");
                    sel.innerHTML = data; 
                });
            });
        });
    </script>

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
            font-size: 15pt;
            width: 300px;
        }
    </style>
</head>

<body>
    <h1>Registrar pago</h1>
    <div id="botones">
        <form action="pagar.php" method="post">
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

            <label for="idPedido">Pedido</label>
            <select disabled="disabled" name="idPedido" id="idPedido">
            </select>

            <label for="monto">Monto a pagar:</label>
            <input type="text" id="monto" name="monto">
            
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">

            <input type="submit" value="Pagar">
        </form>
    </div>
</body>

</html>