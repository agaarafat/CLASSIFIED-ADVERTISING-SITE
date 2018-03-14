<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbads";
$constatus = false;

try {
    $myCon = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    //echo "Connection successfull <br/>";
    $constatus = true;
} catch (SQLException $exception) {
    echo "Error, you are not connected <br/>";
    $constatus = false;
}
?>