<?php

session_start();
include_once '../database/databaseConnect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="../css/profile.css">
    <script src="../js/profile.js"></script>
</head>
<body> 
    

<?php include_once './headerDefault.php';  ?>


    <h1>Profile</h1>
    <div class="profile">

        <div class="logout">
           <a href="../database/logoutuser.php"><button>Log Out</button></a> 
        </div>

        <div class="profilein">
            <div class="menu">
                <div class="address" onclick="address();" id="address">Address</div>
                <div class="purchasehis" onclick="history();" id="purchasehis">Purchase History</div>
            </div>
            <div class="pannel" >
                <div class="addresspannel" id="addresspannel">


                    <div class="checkout">
                        <div class="checkoutin">



                        <?php

                        if (isset($_POST['submit'])) {

                           
                            $country = $_POST['country'];
                            $address = $_POST['address'];
                            $state = $_POST['state'];
                            $city = $_POST['city'];
                            $zip = $_POST['zip'];
                            $phone = $_POST['phone'];
                           


                            $sql3 = "UPDATE `user` SET `country`='$country',`address`='$address',`state`='$state',`city`='$city',`zip`='$zip',`phone`='$phone' WHERE `mail`='" . $_SESSION["email"] . "'";

                            $result = mysqli_query($con, $sql3);


                        }

                        /**--------------------------------Data Display---------------------------------------------------- */
                        
                        $sql="SELECT * FROM `user` WHERE `mail`='" . $_SESSION["email"] . "'";
                        $result1 = mysqli_query($con, $sql);

                        $row=mysqli_fetch_assoc($result1);



                        ?>

                            <form action="./profile.php" method="POST">
                               
            
                                <div> <span>Country/Region *</span> <input type="text"
                                        name="country" id="country" placeholder="Sri Lanka" value="<?php echo $row['country'] ?>" required></div>
                                <div> <span>Street Address *</span><input type="text"
                                        name="address" id="address" placeholder="Street Address" value="<?php echo $row['address'] ?>" required></div>
                                <div> <span>State *</span><input type="text" name="state"
                                        id="state" placeholder="State" value="<?php echo $row['state'] ?>" required></div>
                                <div> <span>City *</span><input type="text" name="city"
                                        id="city" placeholder="City" value="<?php echo $row['city'] ?>" required></div>
                                <div> <span>Postcode / ZIP *</span><input type="text"
                                        name="zip" id="zip" placeholder="ZIP" value="<?php echo $row['zip'] ?>" required></div>
                                <div> <span>Phone *</span><input type="text" name="phone"
                                        id="phone" placeholder="Phone" value="<?php echo $row['phone'] ?>" required></div>
                                <button name="submit">Update Address</button>
                            </form>


                        </div>
                    </div>




                </div>
                <div class="purchasehispannel" id="purchasehispannel">


                    
                    <?php

                        $sql5="SELECT * FROM `orders` WHERE `user_email`='" . $_SESSION["email"] . "'";
                        $result5 = mysqli_query($con, $sql5);

                        while($row5=mysqli_fetch_assoc($result5)){


                        echo "
                        
                        <ul>
                            <li>
                                <img src='../images/Screenshot_20221218_052119.png' >
                            </li>
                            <li>
                                <p>".$row5['order_detail']."</p> 
                                <p>&nbsp; X ".$row5['qty']."</p>
                            </li>
                            <li>
                            ".$row5['total']."
                            </li>
                        </ul>
                        
                        ";

                        }


                    ?>




                    


                   



                </div>
            </div>
        </div>
    </div>



 
    




</body>
</html>