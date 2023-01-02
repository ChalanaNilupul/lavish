<?php
session_start();

include_once './databaseConnect.php';


$email=$_POST['email'];
$password=$_POST['pass'];

$sql = "SELECT * FROM `admin` WHERE `mail`='$email' AND `pass`='$password'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){

    $_SESSION["email"] = $email;
    header("Location:../admin.php");
   
}
else{

   header("Location:../html/signinadmin.php?error=Username And Password Doesn't Match");
    
}


?>