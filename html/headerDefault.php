<?php
include_once '../database/databaseConnect.php';

if(isset($_POST['add_to_cart'])){
    $id = $_GET['id'];
}

$message = '';

if(isset($_POST["add_to_cart"]))
{
	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);

		$cart_data = json_decode($cookie_data, true);

        
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'item_id');

	if(in_array($_GET["id"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["item_id"] == $_GET["id"])
			{
				$cart_data[$keys]["item_qty"] = $cart_data[$keys]["item_qty"] + $_POST["qty"];
                $cart_data[$keys]["item_size"] = $_POST['size'];
                $cart_data[$keys]["item_color"] = $_POST['color'];
			}
		}
	}
	else
	{
		$item_array = array(
            'item_id'=> $_GET['id'],
            'item_qty'=>$_POST['qty'],
            'item_size'=>$_POST['size'],
            'item_color'=>$_POST['color']
		);
		$cart_data[] = $item_array;

       
        $count++;

	}

	
	$item_data = json_encode($cart_data);
	setcookie('shopping_cart', $item_data, time() + (86400 * 30));
	header("location:./item.php?success=1&id=$id");


    
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
				header("location:./store.php?remove=1");
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


if(isset($_COOKIE['shopping_cart']))
{
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
	$cart_data = json_decode($cookie_data, true);
    $count=sizeof($cart_data);
                
               
}
else{
    $count = 0;
}















/*
$cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : "[]";
$cart = json_decode($cart);

if (isset($_POST['add_to_cart'])) {
    array_push($cart,array(
            'item_id' => $_GET['id'],
            'qty' => $_POST['qty'],
            'size' => $_POST['size'],
            'color' => $_POST['color']
        )
    );
    setcookie("cart", json_encode($cart));
    header("location:./item.php?success=1");
}







if(isset($_POST['add_to_cart'])){

    $item_array = array(
        'item_id'=> $_GET['id'],
        'qty'=>$_POST['qty'],
        'size'=>$_POST['size'],
        'color'=>$_POST['color']
    );
    $cart_data[] = $item_array;
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:./item.php?success=1");
}

if(isset($_GET["action"])){
    if($_GET['action']=='delete'){
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]['item_id']==$_GET['id'])
                    {
                        unset($cart_data[$keys]);
                        $item_data = json_encode($cart_data);
                        header("location:./item.php");
                    }
                }
    }
}

*/


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Navbar</title>
        <style>
@import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Righteous', cursive;
}
/*----------------------------------------------------- NAVBAR -----------------------------------------------------------*/
#body.active{
    overflow-y: hidden;
}
.errorCart{
text-align: center;
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
}
.errorCart h2{
margin-top: 20px;
color: rgb(83, 61, 54);
font-size: 20px;
}
.errorCart img{
    width:15vw
}
.clear{
    position: absolute;
    right: 30px;
    top: 10px;

}
.clear a{
 text-decoration: none;
 color: #9e6756;
}
.navbar {
    width: 100%;
    height: 80px;
    display: flex;
    justify-content: space-between;
    position: fixed;
    top: 0;
    background-color: #FBF0ED;
    z-index: 1000;

}

.navbar li {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0px 20px;
    cursor: pointer;
}

.navbar li a {
    color: rgb(158, 103, 86);
    text-decoration: none;
    transition: .5s;

}

.navbar li a:hover {
    color: rgb(39, 39, 39);
}

.navbar .links {
    display: flex;
    width: 25%;
    padding-left: 50px;
}

.navbar .logo {
    display: flex;
    justify-content: center;
    align-items: center;


}

.navbar .cart {
    width: 25%;

    display: flex;
    justify-content: end;

    padding-right: 20px;
}

.navbar .logo #logo {
    width: 150px;
   
}

.navbar .cart {
    display: flex;
}

/* -----------------------------------------------------------------------Mobile Nav -----------------------------------*/

.mobNav {
    position: fixed;
    width: 100%;
    height: 100vh;
    background-color: #FBF0ED;
    display: flex;
    justify-content: center;
    align-items: center;
    left: -100%;
    transition: .5s;
    z-index: 1000;
    top: 0;
}

.mobNav.active {
    left: 0;

}

.mobNav ul {
    text-align: center;
    list-style: none;

}

.mobNav ul li {
    margin-top: 10px;
    font-size: 30px;


}

.mobNav ul li a {

    text-decoration: none;
    color: rgb(158, 103, 86);
}

.mobNav ul li a button {

    width: 100%;
    height: 30px;
    border: 0px ;
    cursor: pointer;
    background-color: transparent;
    border-radius: 5px; margin-top: 10px;
    background-color: #ec5074;
color: #FBF0ED;
}

.burgerMenu {
    width: 30px;
    height: 30px;
    position: fixed;
    cursor: pointer;
    left: 30px;
    top: 30px;
    z-index: 3000;
    display: none;
}

#burger .barOne,
.barTwo,
.barThree {
    margin-top: 10px;
    position: fixed;
    width: 30px;
    height: 3px;
    background-color: rgb(83, 61, 54);
    transition: .5s ease-in-out;
    border-radius: 5px;
}

#burger .barOne {
    transform: translateY(-10px);
}

#burger .barThree {
    transform: translateY(10px);
}

#burger.active .barOne {
    transform: rotate(-45deg);
    transition: .5s;
}

#burger.active .barTwo {
    transform: translateX(-70px);
    transition: .5s;
}

#burger.active .barThree {
    transform: rotate(45deg);
    transition: .5s;
}

#both {
    position: relative;
}

#both .itemnum {
    position: absolute;
    top: 20px;
   
    left: 15px;
    background-color: rgb(255, 48, 48);
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 25px;
}

/* -----------------------------------------------------------------------Mobile Nav End -----------------------------------*/


/*----------------------------------------------------- Cart-----------------------------------------------------------*/
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    z-index: 4000;
    display: none;
    background-color: #0000006d;
}

.overlay.active {
    display: flex;
}

.cartPannel {
    width: 40%;
    height: 100vh;
    background-color: #ffffff;
    position: fixed;
    top: 0;
    right: -40%;
    z-index: 5000;
    transition: .5s;
    display: block;

}

.delete {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 20px;
    cursor: pointer;color: rgb(83, 61, 54);
}

.cartItems {
    margin-top: 40px;
    width: 100%;
    height: 89vh;
    display: block;
    padding: 20px;
    padding-bottom:140px;
    overflow-y: auto;
    margin-bottom: 90px;
}

.cartItem {
    margin-top: 10px;
    width: 100%;
    display: grid;
    grid-template-columns: auto auto auto;
    padding: 20px;
    justify-content: space-between;
    border-bottom: 1px solid black;
}

.cartItem p {
    font-family: 'Poppins', sans-serif;
}

.cartItem .cimg {
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: center;

}

.cartItem .cimg img {
    max-width: 100%;
}

.cproduct {

    padding: 10px;
    text-align: left;

}

.cproductIn {
    width: 100%;
    text-align: left;
    float: left;
}

input[type='number'] {
    width: 50px;
    border: 1px solid black;
    padding-left: 5px;
   
}

.cprice {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.check {
    width: 100%;
    height: 140px;
    background-color: #ffffff;
    padding: 20px;
    position: absolute;
    bottom: 0px;
}

.check ul {
    list-style: none;
    display: flex;
    justify-content: space-between;
}

#close {
    cursor: pointer;
    background-color: rgb(247, 94, 94);
    width: 20px;
    height: 20px;
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff;
    
}

.cbuttons {

    margin-top: 10px;
}

.cbuttons button {
    width: 100%;
    height: 30px;
    border: 0px ;
    cursor: pointer;
    background-color: transparent;
    border-radius: 5px; margin-top: 10px;
    background-color: #ec5074;
color: #FBF0ED;
}

@media only screen and (max-width:1000px) {
   

    .cartPannel {
        width: 60%;
        right: -60%;
    }
}


@media only screen and (max-width:912px) {

.navbar #dekstop {
    display: none;
}

.burgerMenu {
    display: flex;

}
.navbar .cart {
    padding-right: 10px;
}

}
@media only screen and (max-width:768px) {
    .cartPannel {
        width: 100%;
        right: -100%;
    }


}
@media only screen and (max-width:540px) {
   
    .errorCart img{
        width:25vw
    }
    .errorCart h2{
        margin-top: 10px;
    }
    .cartItems {

        padding: 10px;
        padding-bottom: 90px;

    }
    .cartItem .cimg {
        width: 70px;


    }
   

    .cartItem p {
        font-size: 15px;
    }

}
@media only screen and (max-width:539px) {
    
}
@media only screen and (max-width:280px) {
   

    .navbar .logo #logo {
        width: 100px;
    }

    .cartItem .cimg {
        width: 50px;


    }

    .cartItem p {
        font-size: 10px;
    }

}
    </style>
    </head>
    <body id="body">
        <div class="navbar">
            <div class="links">
                <li id="dekstop"><a href="../index.php">Home</a></li>
                <li id="dekstop"><a href="./store.php">Shop</a></li>
                <li id="dekstop"><a href="tel:+94763518862">Contact</a></li>
            </div>
            <div class="logo">
                <!-- <li id="dekstop"><img src="./images/icons8-facebook-60.png"
                    alt=""
                    width="28px"></li> -->
                <img src="../images/Logonew.png" alt="" id="logo">
                <!-- <li id="dekstop"><img src="./images/icons8-instagram-48.png"
                    alt=""
                    width="28px"></li> -->
            </div>
            <div class="cart">
                <!-- <li><a href="">S</a></li> -->
                <li id="dekstop" style="padding-top: 4px;"><a href="../database/profileDirect.php">
                <svg width="23px"  viewBox="0 0 159.95 209.18"><defs><style>.cls-1{fill:none;stroke:#9e6756;stroke-miterlimit:10;stroke-width:13px;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_2-2" data-name="Layer 2"><circle class="cls-1" cx="79.96" cy="54" r="50"/><path class="cls-1" d="M6.46,178.5c2.47-7.95,8.21-26.45,27-41a81,81,0,0,1,42-16,70.78,70.78,0,0,1,32,4c17.89,6.8,27.67,19.31,32,25,8,10.47,10.78,19.58,14,30,3.33,10.77,3,15,1,18-3.48,5.32-11.44,5.82-15,6-16.86.84-62.23,1-123,0-2.91-.14-7.18-.87-10-4C5.34,199.26,1.53,194.38,6.46,178.5Z"/></g></g></svg></a></li>
                
                <li id="both" onclick="myFunction();">
                <svg width="28px"  viewBox="0 0 139.91 151.53"><defs><style>.cls-1{fill:none;}.cls-2{fill:none;stroke:#9e6756;stroke-miterlimit:10;stroke-width:8px;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_2-2" data-name="Layer 2"><circle class="cls-1" cx="42.44" cy="54.31" r="6.46"/><circle class="cls-1" cx="96.91" cy="55.31" r="6.46"/><path class="cls-2" d="M42.18,53.08a63.54,63.54,0,0,1,0-20.8C43.41,25,44.47,18.69,49.61,13,51.1,11.3,57.29,4.61,67.45,4c10.6-.6,17.75,5.91,19.32,7.43,5.63,5.44,7,11.83,8.91,20.8a78.14,78.14,0,0,1,1.49,22.3"/><polygon class="cls-2" points="18.41 39.7 120.59 39.7 135.32 147.53 4.55 147.53 18.41 39.7"/></g></g></svg>
                    <div class="itemnum"><?php  echo $count  ?></div>
                </li>

            </div>
        </div>



        <div class="mobNav" id="mobnav">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./html/store.php">Shop</a></li>
                <li><a href="tel:+94763518862">Contact</a></li>
                <li><a href="./signin.php"><button>Log In</button></a></li>
            </ul>
        </div>



        <div class="burgerMenu" id="burger" onclick="navbar();">
            <div class="barOne" id="barOne"></div>
            <div class="barTwo" id="barTwo"></div>
            <div class="barThree" id="barThree"></div>
        </div>




  <!------------------------------------------------------- NAVBAR ----------------------------------------------->
  <script>
    function navbar(){
    document.getElementById('mobnav').classList.toggle('active');

    document.getElementById('burger').classList.toggle('active');
    document.getElementById('body').classList.toggle('active');
    
  

            }
</script>
<!------------------------------------------------------- NAVBAR ----------------------------------------------->



 <!------------------------------------------------Cart----------------------------------------------->
 <div class="overlay" id="overlay">

 </div>

 <div class="cartPannel" id="cartPannel">
     <div class="delete" onclick="myFunction();"> X Close</div>
     
    <div class="cartItems">



     



    <?php

            
           

            if(isset($_COOKIE['shopping_cart']))
            {    
                $tot=0;

                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);


                



                if(empty($cart_data)){
                    echo "<div class='errorCart'><img src='../images/empty4bag.png' >
                        <h2>Your Cart Is Empty</h2></div>
                    ";
                    $tot = 0;
                }
              /*  else{
                    echo "<div class='clear'><a href='./headerDefault.php?action=clear'>Clear Cart</a>  </div>";
                }*/
                


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
                        <div class='cartItem'>
                            <div class='cimg'>
                                <img src='".$row['img1']."'
                                    >
                            </div>
                            <div class='cproduct'>
                                <div class='cproductIn'>
                                    <p>".$row['title']." - $size</p>
                                   <p>X $qty</p>
                                </div>
                            </div>
                            <div class='cprice'>
                                <div class='cpriceIn'>
                                  <a href='./headerDefault.php?action=delete&id=".$values['item_id']."' style='text-decoration: none;'> <p style='text-align: end;' id='close'>X</p> </a>
                                    <p>  $sub </p>
                                </div>
                            </div>
                        </div> 
                    
                    ";
                }

               
              
   
            }       
            
            else {
                echo "<div class='errorCart'><img src='../images/empty4bag.png' >
                        <h2>Your Cart Is Empty</h2></div>
                ";
                $tot = 0;
            }
            
   
        
        ?>    
       
        



         










    </div>

     <div class="check">
         <ul>
             <li>Sub Total</li>
             <li>Rs <?php echo $tot  ?>.00</li>
         </ul>
         <div class="cbuttons">
           <a href="./cart.php"> <button>View Cart</button></a> 
           <a href="./checkout.php"> <button>Checkout</button></a> 
         </div>
     </div>
 </div>


 <script type="text/JavaScript">
     function myFunction() {
             var x = document.getElementById("cartPannel");
             
             var width=window.innerWidth;
             document.getElementById('body').classList.toggle('active');
             document.getElementById('overlay').classList.toggle('active');
     
            
           
             

         if ( width >= 1000 ) {
                 if (x.style.right === "0%") {
                     x.style.right = "-40%";
                 } 
                 else{
                     x.style.right = "0%";
                 } 
         }

         if ( width >= 769 && width < 1000 ) {
                 if (x.style.right === "0%") {
                     x.style.right = "-60%";console.log(width);
                 } 
                 else{
                     x.style.right = "0%";console.log(width);
                 }
         }

         if ( width >= 1 && width < 769 ) {
                 if (x.style.right === "0%") {
                     x.style.right = "-100%";
                 } 
                 else{
                     x.style.right = "0%";
                 }
         }



     }


 </script>



    </body>
</html>