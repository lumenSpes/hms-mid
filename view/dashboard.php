<?php
    session_start();
    $username=isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $isInSassion = false;
    if(!isset($_SESSION['username'])){
        header("Location: ../view/login.php");
        // echo $username;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <!-- header -->
    <?php include("../model/nav.php");?>
    <!-- main -->
    <main>
        <?php include("appointManage.php");?>
    </main>
    <!-- footer -->
    <?php include("../model/footer.php");?>
</body>
</html>