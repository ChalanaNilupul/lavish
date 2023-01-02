<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="../css/signup.css">
    <!-- <script src="../js/signin.js"></script> -->

</head>
<body>
<?php  include_once './headerDefault.php'    ?>

    <div class="signOut">
        <div class="signIn">
            <h1>Sign Up</h1>
            <form action="../database/signup.php" method="POST">
                <?php      
                    if (isset($_GET['error'])) {  
                        echo "
                        <p id='error'>".$_GET['error']."</p>
                           ";
                    }
                ?>
                <div class="div" ><input type="text" name="fname" id="fname" required="required"><span id="h3">First Name</span></div>
                <div class="div" ><input type="text" name="lname" id="lname" required="required"><span id="h4">Last Name</span></div>
                <div class="div" ><input type="text" name="email" id="email" required="required"><span id="h5">E-Mail</span></div>
                <div class="div" ><input type="password" name="password" id="password" required="required"><span id="h6">Password</span></div>
                <button>Sign Up</button> 

                <p>Already a user ?<a href="./signin.php"> Log In</a></p>
            </form>
        </div>
    </div>


    <?php  include_once '../footer.php'    ?> 
    
</body>
</html>