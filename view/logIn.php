<?php
include('../control/loginAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../control/loginAction.php" method="post" novalidate>
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" >
        <!-- <span><?php //echo $usernameErr;?></span> -->
        <br><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" >
        <span><?php //echo $passwordErr; ?></span>
        <br><br>

        <input type="submit" value="Submit">
    </form>
    <br><br>
    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl,"username=empty") == true){
        echo "please enter a username";
    }
    elseif(strpos($fullUrl,"password=empty") == true){
        echo "please enter a password";
        // echo "Invalid email!";
    }
    elseif(strpos($fullUrl,"login=fail") == true){
        echo "Invalid Credentials";
        // echo "Invalid email!";
    }
    ?>
    <br><br>
    <h5>don't have an accout? <a href="registration.php">Register</a> instade</h5>
    <a href="forgotPassword.php">forgot password?</a>
</body>
</html>