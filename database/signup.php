<?php

include_once './databaseConnect.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['email'];
$pass = $_POST['password'];


if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

    $sql = "SELECT * FROM `user` WHERE `mail`='$mail'";

    $result = mysqli_query($con, $sql);


    if(mysqli_num_rows($result)>0){
    
        //echo "user is here";

        header("Location:../html/signup.php?error=Already there's a user from this Email,Try Login");

    }

    else{

        $sql2 = "INSERT INTO `user`(`fname`, `lname`, `mail`, `pass`) VALUES ('$fname','$lname','$mail','$pass')";

        mysqli_query($con, $sql2);

        header("Location:../html/signin.php");

        //echo 'Not a user';
    }

} 

else {
     header("Location:../html/signup.php?error=Email is not valid");
}








?>