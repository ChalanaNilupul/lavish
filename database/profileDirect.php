<?php
session_start();

if(!isset($_SESSION["email"]))
{
	header("location:../html/signin.php");
	
} else {

    header("location:../html/profile.php");


}



?>