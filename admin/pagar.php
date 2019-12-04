<?php
include('../cnx.php');
print_r($_POST);

$sql = 'INSERT INTO `pagos` (`id_pago`, `fecha_pago`, `monto_pago`, `id_pedido`) VALUES (NULL, ?, ?, ?)';
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['fecha'], $_POST['monto'], $_POST['idPedido']));
header('location: pagado.php');
