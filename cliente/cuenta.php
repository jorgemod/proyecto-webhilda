<?php
session_start();
include("../cnx.php");
if (!isset($_SESSION['id'])) {
  header("location: ../login.html");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cuenta</title>
  <link rel="stylesheet" href="../admin/dash.css">
  <style>
    body{
      font-size: 15pt;
      color: white;
      font-family: poppins, sans-serif;
    }
  </style>
</head>

<body>
  <h1>Bienvenido a tu cuenta</h1>
  <center>
  <?php

  $sql = "SELECT * FROM pedidos where id_cliente = ? AND estado_pedido = 'activo'";
  $stmt = $conn->prepare($sql);
  $stmt->execute(array($_SESSION['id']));
  $pedidos = $stmt->fetchAll();
  foreach ($pedidos as $pedido) {
    ?>
    <h3>Pedido</h3>
    <?php
    // echo $pedido['id_pedido'];
    echo " Precio unitario ";
    echo $pedido['precio_unitario'];
    echo " Precio Total ";
    echo $pedido['monto_total'];
    echo "<br>";

    $sql = "SELECT monto_pago, fecha_pago FROM pagos where id_pedido = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($pedido['id_pedido']));
    $pagos = $stmt->fetchAll();
    $monto = 0;
    foreach($pagos as $pago){
      ?>
    <h4>pagos</h4>
    <?php
      echo $pago['fecha_pago'];
      echo " ";
      echo $pago['monto_pago'];
      echo " ";
      $monto += $pago['monto_pago'];
      echo '<br>';
    }
    ?>
    <h5>Restan: 
    <?php
    echo $pedido['monto_total'] - $monto;
    ?>
    </h5>
    <?php
  }
  
  
  ?>
  </center>
</body>

</html>