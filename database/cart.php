<?php

session_start();

var_dump($_SESSION['cart']);

$whereIn = implode(',', $_SESSION['cart']);

$sql = "SELECT * FROM products WHERE id IN ($whereIn)";

?>