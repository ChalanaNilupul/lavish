<?php session_start();

include_once './database/databaseConnect.php';

if(!isset($_SESSION["email"]))
{
	header("location:./html/signinadmin.php");
	
}

else{



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="./CSS/admin.css">
        <script src="./JS/admin.js"></script>
        <script src="./js/successTimeout.js"></script>
    </head>

    <body>

        <?php

            if (isset($_GET["success"])) {
                echo "<div class='success' id='success'>

                Item Added To The Store Successfully

                </div>";
            }
        ?>





        <div class="menu">
            <div class="name" id="name">
                <h1 style="text-align: center;">

                <?php

                    $sqln = "SELECT * FROM `admin` WHERE `mail`='".$_SESSION["email"]."'";

                    $resultn = mysqli_query($con, $sqln);

                $rown = mysqli_fetch_assoc($resultn);

                echo $rown['name'];


                ?>
            
            
            </h1>
            </div>
            <div class="Dashboard" id="menu1">
                <button onclick="dash()">Dashboard</button>
            </div>
            <div class="addBlog" id="menu2">
                <button onclick="add();">Add Product</button>
            </div>
            <div class="Users" id="menu3">
                <button onclick="users();">Sales</button>
            </div>
            <div class="test" id="menu4">
                <button onclick="test();" id="orderbtn">Orders 
            
                <?php


                       

                    $sqldot = "SELECT * FROM `orders`";

                    $resultdot = mysqli_query($con, $sqldot);

                    if (mysqli_num_rows($resultdot) > 0) {
                        
                            echo "

                                    <p class='dot'></p>

                            ";
                       
                    }

                    ?>
            
            
            </button>
            </div>



           <a href="./database/logout.php"><button id="logout">Log Out</button></a> 



        </div>
        <div class="section">

            <div class="dashboard Sec" id="dashboard">
              <div class="in">
                   <div class="topBars">
                        <div class="one oneSquare">
                            <div class="div">
                                <div class="saletot">


                                <?php

                                $totalSales = 0;
                                $soldTees = 0;
                                    $sqlc = "SELECT * FROM `sales`";

                                    $resultc = mysqli_query($con, $sqlc);

                                    $numOfRows = mysqli_num_rows($resultc);

                                if (mysqli_num_rows($resultc) > 0) {
                                    while ($rowc = mysqli_fetch_assoc($resultc)) {

                                        $totalSales += $rowc['total'];
                                        $soldTees += $rowc['qty'];
                                    }
                                }

                                echo " <p>Rs.$totalSales.00</p>";
                                ?>

                                    <h3>Sales</h3>
                                </div>
                                <div class="saleicon">
                                        <img src="./images/icons8-money-bag-100.png" width="60px">
                                </div>
                            </div>
                        </div>


                        <div class="two oneSquare">
                            <div class="div">
                                <div class="saletot">
                                    <p><?php echo $numOfRows; ?></p>
                                    <h3>Total Sales</h3>
                                </div>
                                <div class="saleicon">
                                        <img src="./images/icons8-total-sales-90.png" width="60px">
                                </div>
                            </div>
                               
                        </div>



                        <div class="three oneSquare">
                            <div class="div">
                                <div class="saletot">


                                <?php

                                $totalStock = 0;
                                        $sqls = "SELECT * FROM `products`";

                                        $results = mysqli_query($con, $sqls);

                                        

                                    if (mysqli_num_rows($results) > 0) {
                                        while ($rows = mysqli_fetch_assoc($results)) {

                                            $totalStock += $rows['qty'];
                                            
                                        }
                                    }
                                    $available=$totalStock- $soldTees;

                                     echo " <p>$available</p>";

                                ?>

                                   
                                    <h3>Available <br> Stock</h3>
                                </div>
                                <div class="saleicon">
                                        <img src="./images/icons8-t-shirt-90.png" width="60px">
                                </div>
                            </div>
                        </div>



                   </div>
                   <h1 style="text-align: center;margin-top:20px;">Users</h1>

                    <div class="search"> 
                        <form action="./admin.php" method="POST">
                            <input type="text" name="txtsearch" id="">
                            <button name="search">Search</button>
                        </form>
                    </div>

                   <div class="analytics">
                    
                        <div class="table" style="margin-top: 20px;">
                            <table cellspacing="0" cellpadding="0">
                                <th>User Email</th>
                                <th>F Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Zip</th>
                                <th>Country</th>

                                <?php


                            
                            if(!isset($_POST['search'])){
                                $sqlu = "SELECT * FROM `user`";

                                $resultu = mysqli_query($con, $sqlu);

                                if (mysqli_num_rows($resultu) > 0) {
                                    while ($rowu = mysqli_fetch_assoc($resultu)) {



                                        echo "

                                            <tr>
                                                <td>".$rowu['mail']."</td>
                                                <td>".$rowu['fname']."</td>
                                                <td>".$rowu['phone']."</td>
                                                <td>".$rowu['address']."</td>
                                                <td>".$rowu['state']."</td>
                                                <td>".$rowu['city']."</td>
                                                <td>".$rowu['zip']."</td>
                                                <td>".$rowu['country']."</td>
                                                
                                            </tr>

                                        ";
                                    }
                                }
                            }
                            else{

                                $searchUser = $_POST['txtsearch'];

                                if(empty($searchUser)){
                                    $sqlu = "SELECT * FROM `user`";

                                    $resultu = mysqli_query($con, $sqlu);
    
                                    if (mysqli_num_rows($resultu) > 0) {
                                        while ($rowu = mysqli_fetch_assoc($resultu)) {
    
    
    
                                            echo "
    
                                                <tr>
                                                    <td>".$rowu['mail']."</td>
                                                    <td>".$rowu['fname']."</td>
                                                    <td>".$rowu['phone']."</td>
                                                    <td>".$rowu['address']."</td>
                                                    <td>".$rowu['state']."</td>
                                                    <td>".$rowu['city']."</td>
                                                    <td>".$rowu['zip']."</td>
                                                    <td>".$rowu['country']."</td>
                                                    
                                                </tr>
    
                                            ";
                                        }
                                    }

                                }

                                else{
                                $sqlSearch = "SELECT * FROM `user` WHERE `mail`='$searchUser'";

                                $resultSearch = mysqli_query($con, $sqlSearch);

                                if (mysqli_num_rows($resultSearch) > 0) {
                                    while ($rowSearch = mysqli_fetch_assoc($resultSearch)) {



                                        echo "

                                            <tr>
                                                <td>".$rowSearch['mail']."</td>
                                                <td>".$rowSearch['fname']."</td>
                                                <td>".$rowSearch['phone']."</td>
                                                <td>".$rowSearch['address']."</td>
                                                <td>".$rowSearch['state']."</td>
                                                <td>".$rowSearch['city']."</td>
                                                <td>".$rowSearch['zip']."</td>
                                                <td>".$rowSearch['country']."</td>
                                                
                                            </tr>

                                        ";
                                        }
                                    }
                                }
                            }



                                ?>


                            </table>
                        </div>
                   </div>
              </div>
            </div>

            <div class="addBlogSec Sec" id="addBlogSec">
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title"><br>

                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" placeholder="Price"><br>

                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Description"></textarea><br>

                    <label for="sku">SKU Unit</label>
                    <input type="text" name="sku" id="sku" placeholder="SKU"><br>

                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" placeholder="Category"><br>

                    <label for="qty">Quentity</label>
                    <input type="text" name="qty" id="qty" placeholder="Quentity"><br>

                    <label for="img1">Image One</label>
                    <input type="file" name="img1" id="img"><br>

                    <label for="img2">Image Two</label>
                    <input type="file" name="img2" id="img"><br>

                    <label for="img3">Image Three</label>
                    <input type="file" name="img3" id="img"><br>

                    
                    <?php

                    if (isset($_POST['add'])) {

                        /* $file_name=$_FILES['img']['name'];
                        $file_type=$_FILES['img']['type'];
                        $file_size=$_FILES['img']['size'];
                        $temp_name=$_FILES['img']['tmp_name'];
                        $upload_to='../Uploads/';
                        move_uploaded_file($temp_name,$upload_to . $file_name);
                        */


                        $title = $_POST['title'];
                        $price = $_POST['price'];
                        $description = $_POST['description'];
                        $sku = $_POST['sku'];
                        $category = $_POST['category'];
                        $qty = $_POST['qty'];
                       

                        $img1 = "./uploads/" . basename($_FILES["img1"]["name"]);
                        move_uploaded_file($_FILES["img1"]["tmp_name"], $img1);

                        $img2 = "./uploads/" . basename($_FILES["img2"]["name"]);
                        move_uploaded_file($_FILES["img2"]["tmp_name"], $img2);

                        $img3= "./uploads/" . basename($_FILES["img3"]["name"]);
                        move_uploaded_file($_FILES["img3"]["tmp_name"], $img3);


                        $sql = "INSERT INTO `products`(`sku`, `qty`, `category`, `price`, `title`, `img1`, `img2`, `img3`, `description`, `status`) VALUES ('$sku','$qty','$category','$price',' $title',' $img1',' $img2',' $img3',' $description','1')";

                        if (mysqli_query($con, $sql)) {
                            header("location:./admin.php?success=1");
                        } else {
                            echo "Error";
                        }

                    }
                    
                ?>           
                    
                    
                    <button name="add">Add</button>

                </form>


            </div>
            <div class="Sec" id="usersSec">
                <div class="table">
                    <table cellspacing="0" cellpadding="0">
                        <th>User Email</th>
                        <th>Item_detail</th>
                        <th>Qantity</th>
                        <th>Total</th>
                        <th>Date</th>

                        <?php


                        

                        $sql = "SELECT * FROM `sales`";

                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {



                                echo "

                                    <tr>
                                        <td>".$row['user_email']."</td>
                                        <td>".$row['order_detail']."</td>
                                        <td>".$row['qty']."</td>
                                        <td>".$row['total']."</td>
                                        <td>".$row['date']."</td>
                                    </tr>

                                ";
                            }
                        }

                        ?>


                    </table>
                </div>
            </div>
            <div class="Sec" id="testSec">
                <div class="table">
                    <table cellspacing="0" cellpadding="0">
                        <th>User Email</th>
                        <th>Item_detail</th>
                        <th>Qantity</th>
                        <th>Total</th>
                        <th>Status</th>

                        <?php


                       

                        $sql1 = "SELECT * FROM `orders`";

                        $result1 = mysqli_query($con, $sql1);

                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {



                                echo "

                                    <tr>
                                        <td>".$row1['user_email']."</td>
                                        <td>".$row1['order_detail']."</td>
                                        <td>".$row1['qty']."</td>
                                        <td>".$row1['total']."</td>
                                        <td><a href='./database/order_complete.php?id=".$row1['id']."'><button>Pending</button></a></td>
                                    </tr>

                                ";
                            }
                        }

                        ?>


                    </table>
                </div>
            </div>


        </div>
 

        <script>
            function dash(){
                var add=document.getElementById('addBlogSec');
                var users=document.getElementById('usersSec');
                var test=document.getElementById('testSec');
                var dash=document.getElementById('dashboard');
                var menu1=document.getElementById('menu1');
                var menu2=document.getElementById('menu2');
                var menu3=document.getElementById('menu3');
                var menu4=document.getElementById('menu4');

                menu1.style.backgroundColor="pink";
                menu2.style.backgroundColor="transparent";
                menu3.style.backgroundColor="transparent";
                menu4.style.backgroundColor="transparent";
                
                
                dash.style.display="flex";
                add.style.display="none";
                users.style.display="none";
                test.style.display="none";

            }
        </script>

    </body>

    </html>



<?php }  ?>