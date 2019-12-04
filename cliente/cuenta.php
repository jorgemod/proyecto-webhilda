<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuenta</title>
</head>

<body>
    <h1>bienvenido a tu cuenta</h1>
    <?php
                
    include("conexion.php");
    $sql = "SELECT * FROM cliente as c inner join pedido as p on c.id_cliente = p.id_cliente inner join pagos as pa on p.id_pedido = pa.id_pedido where estado_pedido='activo'";
    $result = mysqli_query($db, $sql);
    echo '<table>';
        echo '<tr>';
          echo '<th>id pedido</th>';
          echo '<th>cliente</th>';
        echo '</tr>';

    while ($mostrar = mysqli_fetch_array($result) ){
        echo '<tr>';
          echo '<td>'. $mostrar['id_pedido']  . '</td>';
          echo '<td>' . $mostrar['nombre_cliente'] . '</td>';
          echo '<td>' . $mostrar['monto_pago'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
        
    ?>   
</body>

</html>