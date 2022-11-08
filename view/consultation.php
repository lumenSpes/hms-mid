<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../view/login.php");
}
include("../model/nav.php");
?>

<form action="../control/consultationAction.php" method="post" novalidate>
    <label for="patientemail">Patient Email</label>
    <input type="email" name="patientemail" id="patientemail">
    <br><br>
    <label for="meetingLink">Meeting Link</label>
    <input type="url" name="meetingLink" id="meetingLink">
    <br><br>
    <label for="meetinginstructions">Meeting Instructions</label>
    <input type="text" name="meetinginstructions" id="meetinginstructions">
    <br><br>
    
    <input type="submit" value="Submit">
</form>

<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl,"consult=empty") == true){
        echo "You lest some fields empty";
    }
    elseif(strpos($fullUrl,"consultation=email") == true){
        echo "Invalid email address!";
    }
    elseif(strpos($fullUrl,"insertion=failed") == true){
        echo "Something went wrong!";
    }
?>

<?php include("../model/footer.php");?>