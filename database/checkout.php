<?php
   
   include_once '../database/databaseConnect.php'; 
   
   if (isset($_GET['user'])) {
    if ($_GET["user"] == 'user') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $country = $_POST['country'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];


        $sql3 = "UPDATE `user` SET `country`='$country',`address`='$address',`state`='$state',`city`='$city',`zip`='$zip',`phone`='$phone'";

        $result = mysqli_query($con, $sql3);

    }
}

if(isset($_GET['user'])){

    if ($_GET["user"]=='nonuser') {
       

        if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['country']) || empty($_POST['address']) || empty($_POST['state']) || empty($_POST['city']) || empty($_POST['zip']) || empty($_POST['phone']) || empty($_POST['mail'])){
                echo " <div class='empty'>
                            <p> Fill the all feilds </p>
                        </div>
                    ";
        }


        else{

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $country = $_POST['country'];
            $address = $_POST['address'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $phone = $_POST['phone'];
            $mail = $_POST['mail'];


            $sql3 = "INSERT INTO `user`( `fname`, `lname`, `country`, `address`, `state`, `city`, `zip`, `phone`, `mail`) VALUES ('$fname',' $lname','$country','$address','$state','$city','$zip','$phone','$mail')";

            $result = mysqli_query($con, $sql3);

           
        }
    }
}


?>