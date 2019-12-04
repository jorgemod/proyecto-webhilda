<?php
session_start();
include('conexion.php');
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
    <link rel="stylesheet" href="dash.css">
    <title>Pagado</title>

    <meta http-equiv="refresh" content="2; URL=pago.php" />
</head>

<body>
    <h1>Pagado ...</h1>
</body>

</html>