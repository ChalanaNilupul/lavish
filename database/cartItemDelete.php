<?php



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
                        
                    }
                }
    }
}
 
    

?>