<?php
if (isset($_POST['add_to_cart'])) {
    $item_array = array(
        'item_id'=> '4',
        'qty'=>'5',
        'size'=>'m',
        'color'=>'black'
    );
    $cart_data[] = $item_array;
    $item_data = json_encode($cart_data);
    $item_id = '2';
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    echo 'dddd';
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




<form action="./test.php" method="POST">

<button name="add_to_cart">kkkkkkkkkkkkk</button>


</form>




</body>
</html>


