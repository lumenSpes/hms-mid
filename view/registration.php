<?php
session_start();
include("../control/registrationAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratioin</title>
</head>
<body>
    <form action="../control/registrationAction.php" method="post" novalidate>
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" >
        <span><?php //echo $firstnameErr;?></span>
        <br><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" >
        <span><?php //echo $lastnameErr;?></span>
        <br><br>
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" >
        <span><?php //echo $usernameErr;?></span>
        <br><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" >
        <span><?php //echo $emailErr;?></span>
        <br><br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="gender" value="male">
        <label for="gender">Male</label>
        <input type="radio" name="gender" id="gender" value="female">
        <label for="gender">Female</label>
        <span><?php //echo $genderErr;?></span>
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" >
        <span><?php //echo $passwordErr; ?></span>
        <br><br>
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" id="confirmpassword" >
        <span><?php //echo $confirmpasswordErr;?></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl,"register=empty") == true){
        echo "You lest some fields empty";
    }
    elseif(strpos($fullUrl,"register=email") == true){
        echo "Invalid email!";
    }
    ?>
</body>
</html>