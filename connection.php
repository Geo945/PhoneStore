<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_phonestore";

if(!$con = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}

?>