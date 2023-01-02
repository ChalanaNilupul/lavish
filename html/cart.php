<?php
include_once '../database/databaseConnect.php';



$message = '';

if (isset($_POST["add_to_cart"])) {

    if (isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true);


    } else {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if (in_array($_GET["id"], $item_id_list)) {
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $_GET["id"]) {
                $cart_data[$keys]["item_qty"] = $cart_data[$keys]["item_qty"] + $_POST["qty"];
                $cart_data[$keys]["item_size"] = $_POST['size'];
                $cart_data[$keys]["item_color"] = $_POST['color'];
            }
        }
    } else {
        $item_array = array(
            'item_id' => $_GET['id'],
            'item_qty' => $_POST['qty'],
            'item_size' => $_POST['size'],
            'item_color' => $_POST['color']
        );
        $cart_data[] = $item_array;


        $count++;

    }


    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:./cart.php?success=1");


}  


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_id'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				header("location:./cart.php?remove=1");
			}
		}
	}
	if($_GET["action"] == "clear")
	{
		setcookie("shopping_cart", "", time() - 3600);
		header("location:./store.php?clearall=1");
	}
}

if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_GET["clearall"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
	';
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="../css/cart.css">
    <script src="../js/qtySelect.js"></script>

</head>
<body>

 <?php include_once './headerDefault.php';  ?> 

 <?php include_once './test.php';  ?> 
 
    <div class="hero">
        <h1>Cart</h1>
    </div>
    
    <div class="cartMain">
        <div class="cartIn">
            <div class="table">
                


              


                <?php

            
           

if(isset($_COOKIE['shopping_cart']))
{    
    $tot=0;

    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);



    if(empty($cart_data)){
        echo "<div class='errorCartcart'>
            
        <img src='../images/empty4bag.png' >
            <h2>Your Cart Is Empty</h2>
            <a href='./store.php'> <button>Continue Shopping</button></a></div>
        ";
        $tot = 0;
    }
    else{
        echo "<div class='clearCart'><a href='' style='margin-right: 20px;'>Update Cart</a> <a href='./cart.php?action=clear'>Clear Cart</a>   </div>  
        
        <div class='head'>
            <div class='long' id='mobfriend'>Product</div>
            
            <div class='short' id='mobRestrict'>Price</div>
            <div class='short mobQty' id='mobfriendqty'>Quantity</div>
            <div class='short' id='mobRestrict'>Sub Total</div>
            
        </div>
        
        
        
        ";
    }
    


    foreach( $cart_data as $keys => $values){




    

    $qty= $values['item_qty'];
    $color=$values['item_color'];
    $size=$values['item_size'];

    $sql = "SELECT * FROM `products` WHERE `id`='".$values['item_id']."'";

    $result = mysqli_query($con, $sql);

    $row=mysqli_fetch_assoc($result);

   


   /* echo '<pre>';
    print_r($_COOKIE['shopping_cart']);
    echo '</pre>'; */


    $sub = $qty * $row['price'];
    $tot += $sub;

        echo "
        <div class='row'>
            <div  class='long' id='mobfriend'><img src='../images/Screenshot_20221218_052119.png' ><div style='display: block;width: 100%;'><p style='padding-left: 10px;'>".$row['title']." - $size - $color</p><div id='mobPrice'><p>".$row['price']."</p>  <a href='./cart.php?action=delete&id=".$values['item_id']."'>remove</a> </div></div></div>
            
            <div class='short' id='mobRestrict'>Rs ".$row['price'].".00</div>
            <div  class='short' id='mobfriendqty'>
                <button onclick='removeQty()'>-</button>
                <div id='quantity'>$qty</div>
                <button onclick='addQty()'>+</button>
            </div class='short'>
            <div class='short' id='mobRestrict'>Rs $sub.00</div>
            <button class='delete'>X</button>
       
        </div>
        
        ";
    }

   
  

}       

 
else {
    echo "<div class='errorCartcart'><img src='../images/empty4bag.png' >
            <h2>Your Cart Is Empty</h2></div>
    ";
    $tot = 0;
}



?>    















              



              




            </div>
          
        </div>
    </div>


    <?php


    if (!empty($cart_data)) {

        echo "
        <div class='checkSec'>
            <div class='checkIn'>
                <div class='tot'>
                    <h4>Total</h4>
                    <h4> Rs $tot.00</h4>
                </div>
                <div class='checkBTN'>
                    <button>Preceed To Checkout</button>
                </div>
            </div>
        </div>
        
        ";

    }




    ?>



   


</body>
</html>