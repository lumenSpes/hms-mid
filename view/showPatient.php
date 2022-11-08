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
<br><br>
<form action="../control/viewHistoryAction.php" method="get">
    <h3>Name</h3><span><?php echo $firstname." ".$lastname;?></span>
    <h3>Age</h3><span><?php echo $age;?></span>
    <h3>Email</h3><span><?php echo $email;?></span>
    <h3>Gender</h3><span><?php echo $gender;?></span>
    <h3>Phone</h3><span><?php echo $phone;?></span>
    <h3>Desease</h3><span><?php echo $desease;?></span>
</form>

<a href="../view/addPrescription.php"><input type="submit" value="Prescribe"></a>

<br><br>

<?php include("../model/footer.php");?>