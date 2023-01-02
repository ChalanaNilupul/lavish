<?php


    setcookie("shopping_cart", "", time() - 3600);
    header("location:../html/index.php");


?>