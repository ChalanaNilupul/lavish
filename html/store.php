<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="../css/store.css">
</head>
<body>

<?php  include_once './headerDefault.php'    ?>


    <div class="hero">
        <h1>Store</h1>
    </div>
    <div class="store">
       
        <div class="storeIn">
            <div class="items">


<?php

        include_once '../database/databaseConnect.php';

        $sql = "SELECT * FROM `products` WHERE `status`='1'";
        
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo"  


                    <a href='./item.php?id=" . $row["id"] . "'>
                        <div class='item'>
                            <div class='img'>
                                <img src=' " . $row["img1"] . "' >
                                
                            </div>
                            <div class='topic'>
                            " . $row["title"] . "
                            
                            </div>
                            <div class='price'>
                            Rs " . $row["price"] . ".00
                            </div>
                        </div>
                    </a> 

                ";
            }
        }
               

  ?>

            </div>
        </div>
    </div>

    <?php  include_once '../footer.php'    ?>


</body>
</html>