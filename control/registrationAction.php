<?php
//session_start();
$firstnameErr = "";
$lastnameErr = "";
$usernameErr = "";
$emailErr = "";
$genderErr = "";
$passwordErr = "";
$confirmpasswordErr = "";
$firstname = "";
$lastname = "";
$username = "";
$email = "";
$gender = "";
$password = "";
$confirmpassword = "";
if($_SERVER['REQUEST_METHOD'] === "POST"){
    // echo "i am here";
    if(empty($_POST['firstname'])){
        // $firstnameErr = "Please Provide your first name";
        header("location: ../view/registration.php?register=empty");
        exit();
    }
    else{
        $firstname = sanitize($_POST['firstname']);
    }
    if(empty($_POST['lastname'])){
        // $lastnameErr = "Please Provide your first name";
        header("location: ../view/registration.php?register=empty");
        exit();
    }
    else{
        $lastname = sanitize($_POST['lastname']);
    }
    if(empty($_POST['username'])){
        // $usernameErr = "Please Provide your first name";
        header("location: ../view/registration.php?register=empty");
        exit();
    }
    else{
        $username = sanitize($_POST['username']);
        $_SESSION['username'] = $username;
    }
    if(empty($_POST['email'])){
        // $emailErr = "Please Provide your first name";
        header("location: ../view/registration.php?register=empty");
        exit();
    }
    else{
        $email = sanitize($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: ../view/registration.php?register=email");
            exit();
            // $emailErr = "Enter a valid email address";
        }
    }
    if(empty($_POST['gender'])){
        // $genderErr = "Please Provide your first name";
        header("location: ../view/registration.php?register=empty");
        exit();
    }
    else{
        $gender = sanitize($_POST['gender']);
    }
    if(empty($_POST['password'])){
        // $passwordErr = "Please Provide your first name";
        header("location: ../view/registration.php");
        exit();
    }
    else{
        $password = sanitize($_POST['password']);
    }
    if(empty($_POST['confirmpassword'])){
        // $confirmpasswordErr = "Please Provide your first name";
        header("location: ../view/registration.php?register=empty");
    }
    else{
        $confirmpassword = sanitize($_POST['confirmpassword']);
    }

    $filename = "../model/users.json";
    if(!file_exists($filename)){
        $file = fopen($filename, "w");
        $data = array(array("firstname" => $firstname, 
            "lastname" => $lastname, "username" => $username, 
            "email" => $email, "gender" => $gender, 
            "password" => $password, 
            "confirmpassword" => $confirmpassword));
        $data = json_encode($data);
        fwrite($file, $data);
        fclose($file);
        echo " registration successfull";
        header("loacation: ../view/dashboard.php");
    }
    if(file_exists($filename)){
        $previousdata = file_get_contents($filename);
        $previousarraydata = json_decode($previousdata);
        $newdata = array("firstname" => $firstname, 
        "lastname" => $lastname, "username" => $username, 
        "email" => $email, "gender" => $gender, 
        "password" => $password, 
        "confirmpassword" => $confirmpassword);
        $previousarraydata[] = $newdata;
        $data = json_encode($previousarraydata);
        if(file_put_contents($filename,$data)){
            header("location: ../view/dashboard.php");
            echo " registration successfull again";
            // fclose($filename);
        } 
        else{
            echo " registration unsuccessfull";
            // header("location: ../view/registration.php");
        }
    }
    
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>