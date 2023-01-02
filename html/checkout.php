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
    <title>Checkout</title>

    <link rel="stylesheet" href="../css/checkout.css">

</head>

<body>

    <?php include_once './headerDefault.php';  ?>

    <h1>Checkout</h1>

    <?php
    if (isset($_COOKIE['shopping_cart'])) {

        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);

        if(!empty($cart_data)){
        
        ?>


    <div class="checkout">
        <div class="checkoutin">



            <?php


            if (isset($_SESSION["email"])) {

                $sql = "SELECT * FROM `user` WHERE `mail`='" . $_SESSION["email"] . "'";

                $result = mysqli_query($con, $sql);

                $row = mysqli_fetch_assoc($result);


                echo "
                    <form action='./checkout.php' method='POST' id='myform'>
                    <div> <span>First Name *</span> <input type='text'
                            name='fname' id='fname' placeholder='First Name' style='margin-right: 4%;' value='" . $row['fname'] . "' required>
                        <input type='text' name='lname' id='lname'
                            placeholder='Last Name' value='" . $row['lname'] . "'></div>

                    <div> <span>Country/Region *</span> <input type='text'
                            name='country' id='country' placeholder='Sri Lanka' value='" . $row['country'] . "' required></div>
                    <div> <span>Street Address *</span><input type='text'
                            name='address' id='address' placeholder='Address' value='" . $row['address'] . "' required></div>
                    <div> <span>State *</span><input type='text' name='state'
                            id='state' placeholder='State' value='" . $row['state'] . "' required></div>
                    <div> <span>City *</span><input type='text' name='city'
                            id='city' placeholder='City' value='" . $row['city'] . "' required></div>
                    <div> <span>Postcode / ZIP *</span><input type='text'
                            name='zip' id='zip' placeholder='ZIP' value='" . $row['zip'] . "' required></div>
                    <div> <span>Phone *</span><input type='text' name='phone'
                            id='phone' placeholder='Phone Number' value='" . $row['phone'] . "' required></div>
                    <div> <span>Email Address *</span><input type='email'
                            name='mail' id='mail' placeholder='E-mail' value='" . $row['mail'] . "' required></div>
                    <div> <span style='padding-top: 10px;'>Other Notes</span><textarea name='note'
                            id='note' placeholder='Note'></textarea></div>
                </form>


                    ";

                $user = 'user';

                if(isset($_POST['submit'])){
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $country = $_POST['country'];
                        $address = $_POST['address'];
                        $state = $_POST['state'];
                        $city = $_POST['city'];
                        $zip = $_POST['zip'];
                        $phone = $_POST['phone'];
                        $mail = $_POST['mail'];


                        $sql3 = "UPDATE `user` SET `country`='$country',`address`='$address',`state`='$state',`city`='$city',`zip`='$zip',`phone`='$phone' WHERE `mail`='".$_SESSION["email"]."'";

                        $result = mysqli_query($con, $sql3);

                /**------------------------------------Insert into orders------------------------------------------------- */


                $tot = 0;

                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
        
        
        
                foreach ($cart_data as $keys => $values) {
        
        
        
        
        
                    $note = $_POST['note'];
                    $qty = $values['item_qty'];
                    $color = $values['item_color'];
                    $size = $values['item_size'];
        
                    $sql = "SELECT * FROM `products` WHERE `id`='" . $values['item_id'] . "'";
        
                    $result = mysqli_query($con, $sql);
        
                    $row = mysqli_fetch_assoc($result);
        
        
                    $sub = $qty * $row['price'];
                    $tot += $sub;
        
        
                    $sql2 = "INSERT INTO `orders`(`user_email`,`order_detail`,`qty`,`total`) VALUES ('". $_SESSION["email"]."','".$row['title']."-$size-$color','$qty','$sub')";
        
                    $result = mysqli_query($con, $sql2);
        
                   
        
        
                }
                
               
                
                ?>
                    <script type="text/javascript">
                        window.location.href = './headerDefault.php?action=clear';
                    </script>
                <?php

                }
                
            } 
            
            
            
            
            else {

                

                echo "
                <form action='./checkout.php' method='POST' id='myform'>
                    <div> <span>First Name *</span> <input type='text'
                            name='fname' id='fname' placeholder='First Name' style='margin-right: 4%;' required>
                        <input type='text' name='lname' id='lname'
                            placeholder='Last Name' ></div>

                    <div> <span>Country/Region *</span> <input type='text'
                            name='country' id='country' placeholder='Sri Lanka' required></div>
                    <div> <span>Street Address *</span><input type='text'
                            name='address' id='address' placeholder='Address' required></div>
                    <div> <span>State *</span><input type='text' name='state'
                            id='state' placeholder='State' required></div>
                    <div> <span>City *</span><input type='text' name='city'
                            id='city' placeholder='City' required></div>
                    <div> <span>Postcode / ZIP *</span><input type='text'
                            name='zip' id='zip' placeholder='ZIP' required></div>
                    <div> <span>Phone *</span><input type='text' name='phone' placeholder='Phone Number' required></div>
                    <div> <span>Email Address *</span><input type='email'
                            name='mail' id='mail' placeholder='E-mail' required></div>
                    <div> <span style='padding-top: 10px;'>Other Notes</span><textarea name='note'
                            id='note' placeholder='Note'></textarea></div>
                </form>


                ";

                $user = 'nonuser';

                


                       /* if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['country']) || empty($_POST['address']) || empty($_POST['state']) || empty($_POST['city']) || empty($_POST['zip']) || empty($_POST['phone']) || empty($_POST['mail'])) {
                            echo " <div class='empty'>
                                        <p> Fill the all feilds </p>
                                    </div>
                                ";
                        } else {  */
                    if(isset($_POST['submit'])){
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

                           
                            

            /**------------------------------------Insert into orders------------------------------------------------- */


            $tot = 0;

            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
    
    
    
            foreach ($cart_data as $keys => $values) {
    
    
    
    
    
                $note = $_POST['note'];
                $qty = $values['item_qty'];
                $color = $values['item_color'];
                $size = $values['item_size'];
    
                $sql = "SELECT * FROM `products` WHERE `id`='" . $values['item_id'] . "'";
    
                $result = mysqli_query($con, $sql);
    
                $row = mysqli_fetch_assoc($result);
    
    
                $sub = $qty * $row['price'];
                $tot += $sub;
    
    
                $sql2 = "INSERT INTO `orders`(`user_email`,`order_detail`,`qty`,`total`) VALUES ('$mail','".$row['title']."-$size-$color','$qty','$sub')";
    
                $result = mysqli_query($con, $sql2);
    
               
    
    
            }
            
           
            
            ?>
                <script type="text/javascript">
                    window.location.href = './headerDefault.php?action=clear';
                </script>
            <?php


                    }

                       /* }*/
                 
            }



            ?>











            <div class="orderDetail">
                <h1>Your Order</h1>
                <div class="row1">
                    <div class="product">
                        Product
                    </div>
                    <div class="allorders">

                        <?php

                        if (isset($_COOKIE['shopping_cart'])) {


                            $tot = 0;

                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);



                            foreach ($cart_data as $keys => $values) {






                                $qty = $values['item_qty'];
                                $color = $values['item_color'];
                                $size = $values['item_size'];

                                $sql = "SELECT * FROM `products` WHERE `id`='" . $values['item_id'] . "'";

                                $result = mysqli_query($con, $sql);

                                $row = mysqli_fetch_assoc($result);


                                $sub = $qty * $row['price'];
                                $tot += $sub;


                                echo "
                                
                                <ul>
                                    <li style='text-align: left;'>" . $row['title'] . " -  $size - $color </li>
                                    <li style='text-align: center;'>×  $qty</li>
                                    <li style='text-align: right;'>Rs " . $row['price'] . ".00</li>
                                </ul>
                                
                                ";
                            }



                        }

                        ?>




                      




                    </div>
                </div>
                <div class="row2">
                    <div class="total">
                        Total
                    </div>
                    <div class="totprice">
                        <?php echo $tot ?>
                    </div>
                </div>
                <div class="row3">
                    <div class="Payment">
                        Payment
                    </div>
                    <div class="visa">
                        <input type="checkbox" name="check" id="check">Visa / Master / Amex / Diners Club / Discover / China Union Pay / DFCC Wallet / Sampath Vishwa / eZcash / MCash / FriMi / UPay / Genie
                    </div>
                </div>

                <div class="placeorder">
                   <button form="myform" name="submit">Place Order</button>
                </div>
            </div>


        </div>
    </div>

    <?php
        }
        else{

            echo "<div class='noItems'>
                <p> You have no items to purchase</p>
            </div>   ";
        }
    }
    else{

        echo "<div class='noItems'>
            <p> You have no items to purchase</p>
        </div>   ";
    }

    ?>


</body>

</html>