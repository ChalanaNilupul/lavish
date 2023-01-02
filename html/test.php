<?php
function erase(){
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
	$cart_data = json_decode($cookie_data, true);
    $item_data = json_encode($cart_data);
	setcookie('shopping_cart', $item_data, time() + (86400 * 30));
}

?>