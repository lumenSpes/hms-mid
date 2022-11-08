<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <form action="../control/forgotPasswordAction.php" method="post">
        <label for="username">Enter Username</label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="email">Enter Email</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="newpassword">Enter New Password</label>
        <input type="newpassword" name="newpassword" id="newpassword">
        <br><br>
        <label for="confirmnewpassword">Confirm New Password</label>
        <input type="confirmnewpassword" name="confirmnewpassword" id="confirmnewpassword">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>