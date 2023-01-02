<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <link rel="stylesheet" href="../css/signin.css">
    <!-- <script src="../js/signin.js"></script> -->

</head>
<body>
<?php  include_once './headerDefault.php'    ?>

    <div class="signOut">
        <div class="signIn">
            <h1>Log In</h1>
            <form action="../database/signin.php" method="POST">
                <?php      
                    if (isset($_GET['error'])) {  
                        echo "
                        <p id='error'>".$_GET['error']."</p>
                           ";
                    }
                ?>
               
                <div class="div" ><input type="text" name="email" id="email" required="required"><span id="h3">E-Mail</span></div>
                <div class="div" ><input type="password" name="password" id="password" required="required"><span id="h3">Password</span></div>
                <button>Log In</button> 

                <p>Didn't have an account ?<a href="./signup.php"> Sign Up</a></p>
            </form>
        </div>
    </div>


    <?php  include_once '../footer.php'    ?>
    
</body>
</html>