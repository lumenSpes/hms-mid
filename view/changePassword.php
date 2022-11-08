<?php
    session_start();
    $username=isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $isInSassion = false;
    if(!isset($_SESSION['username'])){
        header("Location: ../view/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form action="../control/changePasswordAction.php" method="post" novalidate>
        <span><?php //echo $mismatcherr; ?></span>

        <label for="previouspassword">enter previous password</label>
        <input type="password" name="previouspassword" id="previouspassword" >
        <span><?php  //echo $prevpasswordErr; ?></span>
        <br><br>
        <label for="newpassword">Enter New Password</label>
        <input type="password" name="newpassword" id="newpassword" >
        <span><?php  //echo $newpasswordErr;?></span>
        <br><br>
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" id="confirmpassword" >
        <span><?php  //echo $confirmpasswordErr;?></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl,"email=empty") == true){
        echo "plaease provide an email address";
    }
    elseif(strpos($fullUrl,"period=empty") == true){
        echo "invalid email";
    }
?>
</body>
</html>