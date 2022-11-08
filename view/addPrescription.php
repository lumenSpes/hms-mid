<?php
session_start();
$firstname = $_SESSION['patientfirstname'];
$lastname= $_SESSION['patientlastname'];
$age = $_SESSION['patientage'];
$email = $_SESSION['patientemail'];
$gender = $_SESSION['patientgender'];
$phone = $_SESSION['patientphone'];
$desease = $_SESSION['patientdesease'];
?>

<?php include("../model/nav.php");?>
<form action="../control/prescriptionAction.php" method="post">
    <label for="addmedicine">Medecine Name: </label>
    <input type="text" name="addmedicine" id="addmedicine">
    <br><br>
    Period
    <input type="radio" name="period" id="morning" value="morning">
    <label for="morning">Morning</label>
    <input type="radio" name="period" id="noon" value="morning">
    <label for="noon">Noon</label>
    <input type="radio" name="period" id="night" value="morning">
    <label for="night">Night</label>
    <br><br>
    <label for="instruction">Instructions: </label>
    <input type="text" name="instruction" id="instruction">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    if(strpos($fullUrl,"medicine=empty") == true){
        echo "add medicine";
    }
    elseif(strpos($fullUrl,"period=empty") == true){
        echo "add dossage period";
    }
    ?>
    <?php include("../model/footer.php");?>