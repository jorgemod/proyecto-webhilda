<?php
session_start();
include("conexion.php");

$pass = hash("sha256", $_POST['password']);
$user = $_POST['password'];

echo $pass;

// if ( hash("sha256", $_POST["mat"]) == $cuenta && $pass == hash("sha256", $_POST["password"]) ) {

// } else {
//     header("location: login.php");
// }