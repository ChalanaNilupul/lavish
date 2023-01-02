<?php

include_once './databaseConnect.php';

/*-------------------------------ADDING TO SALES------------------------------------------------- */
$id=$_GET['id'];

$sql1 = "SELECT * FROM `orders` WHERE `id`='$id'";

$result1 = mysqli_query($con, $sql1);

if (mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = "INSERT INTO `sales`( `user_email`, `order_detail`, `qty`, `total`) VALUES ('".$row1['user_email']."','".$row1['order_detail']."','".$row1['qty']."','".$row1['total']."')";
    $result2 = mysqli_query($con, $sql2);

}

/*-------------------------------REMOVE FROM ORDERS------------------------------------------------- */
$sql3 = "DELETE FROM `orders` WHERE `id`='$id'";
mysqli_query($con, $sql3);


header("location:../admin.php");

?>