<?php
/**
 * Created by PhpStorm.
 * User: saidgonzalez
 * Date: 10/22/18
 * Time: 12:36 PM
 * use by jorge and joss
 *
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','1234');
define('DB_DATABASE', 'sistema_web');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($db == false) {
    die("Connection failed: " .mysqli_connect_error());
}