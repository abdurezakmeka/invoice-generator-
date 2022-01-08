<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "id18060865_test";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
    exit();
}