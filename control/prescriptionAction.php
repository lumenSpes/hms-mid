<?php
session_start();
$firstname = $_SESSION['patientfirstname'];
$lastname= $_SESSION['patientlastname'];
$age = $_SESSION['patientage'];
$email = $_SESSION['patientemail'];
$gender = $_SESSION['patientgender'];
$phone = $_SESSION['patientphone'];
$desease = $_SESSION['patientdesease'];

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(empty($_POST['addmedicine'])){
        // $medecineErr = "please prescribe a medicine";
        header("location:../view/addPrescription.php?medicine=empty");
        exit();
    }
    else{
        $medecinename = $_POST['addmedicine'];
    }
    if(empty($_POST['period'])){
        header("location:../view/addPrescription.php?period=empty");
        exit();
        // $periodErr = "please prescribe a Dossage";
    }
    else{
        $dossage = $_POST['period'];
    }
    $instruction = $_POST['instruction'];

    $filename = "../model/prescription.json";
    if(!file_exists($filename)){
        $file = fopen($filename, "w");
        $data = array(array("firstname" => $firstname, 
            "lastname" => $lastname,  
            "email" => $email, "gender" => $gender, 
            "phone" => $phone, 
            "desease" => $desease,
            "medecine" => $medecinename,
            "dossage" => $dossage,
            "instruction" => $instruction));
        $data = json_encode($data,JSON_PRETTY_PRINT);
        fwrite($file, $data);
        fclose($file);
        echo " registration successfull";
        header("loacation: ../view/dashboard.php");
    }
    if(file_exists($filename)){
        $previousdata = file_get_contents($filename);
        $previousarraydata = json_decode($previousdata);
        $newdata = array("firstname" => $firstname, 
        "lastname" => $lastname,  
        "email" => $email, "gender" => $gender, 
        "phone" => $phone, 
        "desease" => $desease,
        "medecine" => $medecinename,
        "dossage" => $dossage,
        "instruction" => $instruction);
        $previousarraydata[] = $newdata;
        $data = json_encode($previousarraydata,JSON_PRETTY_PRINT);
        if(file_put_contents($filename,$data)){
            header("location: ../view/dashboard.php");
            // echo " registration successfull again";
            // fclose($filename);
        } 
        else{
            header("location: ../view/addPrescription.php");
            // echo " registration unsuccessfull";
            // header("location: ../view/registration.php");
        }
    }

}

?>