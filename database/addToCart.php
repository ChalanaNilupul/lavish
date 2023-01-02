<?php

session_start();

if(!(isset($_SESSION['cart']))){
    $_SESSION['cart'];
}

if(isset($_POST['clear'])){
    unset($_SESSION['cart']);
}//Empty Array


if(isset($_GET['id'])){
    $pid = $_GET['id'];
    $qty = $_POST['qty'];
    $clr = $_POST['color'];
    $size = $_POST['size'];
   
        if(isset($_SESSION[$pid])){
            $_SESSION['cart'][$pid] += $qty ;
           
        }
        else{
            $_SESSION['cart'][$pid] = $qty;
        }//if buy case

    $_SESSION['cart'][$pid]=array(
        $qty,
        $clr,
        $size,
       
    );
}

echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';


?>
