<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item</title>


    <link rel="icon" type="image/x-icon" href="../Images/icona.ico">

    <meta name="title" content="Lavish Apparels | Web and Software
        Developing Company">
    <meta name="description" content="CFS helps you to find the best solutin
        for your problems. specialised in web developing,app
        developing,software developing,UI/UX designing 2d animations and
        logo designing">
    <meta name="keywords" content="">
    <meta name="author" content="Lavish Apparels">


    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bycfs.com/">
    <meta property="og:title" content="Lavish Apparels | The Solution
        Builder">
    <meta property="og:description" content="CFS helps you to find the best solutin for your problems.
        specialised in web developing,app developing,software
        developing,UI/UX designing 2d animations and logo designing">
    <meta property="og:image" content="https://codices.dev/Images/OG_Card-01.png">

    <meta property="twitter:card" content="Lavish Apparels | The Solution
        Builder">
    <meta property="twitter:url" content="https://bycfs.com/">
    <meta property="twitter:title" content="Lavish Apparels | The Solution
        Builder">
    <meta property="twitter:description" content="CFS helps you to find the best solutin for your problems.
        specialised in web developing,app developing,software
        developing,UI/UX designing 2d animations and logo designing">
    <meta property="twitter:image" content="https://codices.dev/Images/Tweet_Card-02.png">






    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/item.css">

    <script src="../js/imageChange.js"></script>
    <script src="../js/color.js"></script>

    <script src="../js/successTimeout.js"></script>

</head>

<body id="body">


    <?php

    include_once './headerDefault.php';




    ?>



    <!-------------------------------------------------------Item Description----------------------------------------------->


    <div class="itemMain">


        <?php

        if (isset($_GET["success"])) {
            echo "<div class='success' id='success'>

            Item Added To The Cart Successfully
    
            </div>";
        }





        include_once '../database/databaseConnect.php';
        $id = $_GET['id'];


        $sql = "SELECT * FROM `products` WHERE `id`='$id'";

        $result = mysqli_query($con, $sql);


        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);


            /*--------------------------------Getting color-------------------------------------------- */

            $sql1 = "SELECT DISTINCT `color` FROM `product_detail` WHERE `sku`='" . $row["sku"] . "'";
            $result1 = mysqli_query($con, $sql1);


            $num = mysqli_num_rows($result1);

           

            while( $row1 = mysqli_fetch_assoc($result1)){
               /* echo $row1['color'];*/
                
            }

          /*  for ($i = 0; $i < $num;$i++){
                print_r($row1);
            }*/

            echo "



        <div class='itemDetails'>
        <div class='itemImage'>
        <form action='./headerDefault.php?id=$id' method='POST'>   
            <div class='one' id='mainImg'>
                <img src='" . $row["img1"] . "' >
            </div>
            <div class='two'>
                <div class='img1' id='img1' onclick='img1();'><img src='" . $row["img1"] . "' ></div>
                <div class='img2' id='img2' onclick='img2();'><img src='" . $row["img2"] . "' ></div>
                <div class='img3' id='img3' onclick='img3();'><img src='" . $row["img3"] . "' ></div>
            </div>
        </div>

        <div class='itemDes'>
            <h1> " . $row["title"] . "</h1>
        
            
            <h2 name='price'>Rs  " . $row["price"] . ".00</h2>
        
           

            <p>Colors</p>
            <div class='color'>
                <input type='radio' name='color' id='color1' onclick='color();'  value='pink' required >
                <input type='radio' name='color' id='color2'  onclick='color();'  value='black'> 
                <input type='radio' name='color' id='color3'  onclick='color();'  value='yellow'>
                <input type='radio' name='color' id='color4'  onclick='color();'  value='purple'>

                <div class='c1' id='c1' style='background-color: aqua;'></div>
                <div class='c2' id='c2' style='background-color: aqua;'></div>
                <div class='c3' id='c3' style='background-color: aqua;'></div>
                <div class='c4' id='c4' style='background-color: aqua;'></div>
            </div>
            <p>Size</p>
            <select name='size' id='size' required>
                <option value=''></option>
                <option value='S'>S</option>
                <option value='M'>M</option>
                <option value='L'>L</option>
            </select> <br>

            <p>Quantity</p>   
            <input type='number' name='qty' id='qty' min='0' required> <span>3 Items Available</span>

           
            <button name='add_to_cart'>Add To Cart</button><br>
            <!-- <button>Buy Now</button> -->
        </form>

            <div class='itemDescription'>
                <h2>Description</h2>
               <li>Your perfect addition to the wardrobe’s basic staples.</li>
               <li>Classic single jersey knit with the soft cotton touch.</li>
               <li>Features a straight hem finish with long sleeves.</li>
               <li>Ribbed high neckline with Meraki wording logo in embroidery.</li>
               <li>Model Sean is 5’7″ (170 cm) in height and wears size L.</li>
            </div>


            <div class='sizeChart'>
                <img src='../images/SIZE-CHART-08.jpg' >
            </div>

        </div>
    </div>


        ";
        }



        ?>











































    </div>















    <?php include_once '../footer.php'    ?>



    <!------------------------------------------------------- NAVBAR ----------------------------------------------->
    <script>
        function navbar() {
            document.getElementById('mobnav').classList.toggle('active');

            document.getElementById('burger').classList.toggle('active');
            document.getElementById('body').classList.toggle('active');



        }
    </script>
    <!------------------------------------------------------- NAVBAR ----------------------------------------------->

    
    <script>
        function myFunction() {
            var x = document.getElementById("cartPannel");

            var width = window.innerWidth;
            document.getElementById('body').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');





            if (width >= 1000) {
                if (x.style.right === "0%") {
                    x.style.right = "-40%";
                } else {
                    x.style.right = "0%";
                }
            }

            if (width >= 769 && width < 1000) {
                if (x.style.right === "0%") {
                    x.style.right = "-60%";
                    console.log(width);
                } else {
                    x.style.right = "0%";
                    console.log(width);
                }
            }

            if (width >= 1 && width < 769) {
                if (x.style.right === "0%") {
                    x.style.right = "-100%";
                } else {
                    x.style.right = "0%";
                }
            }



        }
    </script>


</body>

</html>