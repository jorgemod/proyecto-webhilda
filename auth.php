<?php
session_start();
include("cnx.php");
$sql = "SELECT * FROM `cliente` WHERE nombre_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['username']));
$users = $stmt->fetchAll();
if (isset($users[0])) {
    // password_verify($_POST['password'], $users[0]['password'])
    if ($_POST['password'] == $users[0]['password']) {
        $_SESSION['id'] = $users[0]['id_cliente'];
        if ($users[0]['nombre_cliente'] == "admin") {
            // TODO ¿A donde mando al administrador?
            header("location: productos/productos.php");
        } else {
            header("location: productos/productos.php");
        }
    } else {
        header("location: trylogin.html");
    }
} else {
    header("location: trylogin.html");
}
