<?php

$servername = "localhost";
$username = "root";
$password = '1234';
$db = "sistema_web";

try {
    $conn = new PDO("mysql:host=$servername;dbname=".$db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ejote) {
    echo "Tono como ejote " . $ejote->getMessage();
}
