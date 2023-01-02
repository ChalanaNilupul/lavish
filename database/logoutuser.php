<?php

 session_start();
 unset($_SESSION["email"]);
 header("location:../html/signin.php");


?>