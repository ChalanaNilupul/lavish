<?php
session_start();

include_once './databaseConnect.php';


if (isset($_COOKIE['shopping_cart'])) {

    if (isset($_SESSION["email"])) {
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


            $sql2 = "INSERT INTO `orders`(`user_email`,`order_detail`,`qty`,`total`) VALUES ('". $_SESSION["email"]."','".$row['title']."-$size-$color','$qty','$tot')";

            $result = mysqli_query($con, $sql2);

           


        }
        /*setcookie("shopping_cart", "", time() - 3600);
	    header("location:../html/store.php?clearall=1");*/
    }
    else{

    
    }
    
  

} 


else {
    echo $_SESSION["email"];
    print_r($_COOKIE['shopping_cart']);
}
?>