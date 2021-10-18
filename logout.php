<?php

session_start();

if( isset($_SESSION['user_id']) ){

    unset($_SESSION['user_id']);
}

if( isset($_SESSION['shopping_cart']) ){

    unset($_SESSION['shopping_cart']);
}

header("Location: login.php")

?>