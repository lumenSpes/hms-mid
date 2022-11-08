<?php
$isValid = false;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['username'])){
        $usernameErr = "Username field is empty";
        header('location: ../view/changePassword.php');
        exit();
    }
    else{
        $username = $_POST['username'];
    }
    
    if(empty($_POST['email'])){
        $emailErr = "Email field is empty";
        header('location: ../view/changePassword.php');
        exit();
    }
    else{
        $email = $_POST['email'];
    }
    if(empty($_POST['newpassword'])){
        $newpasswordErr = "New Password field is empty";
        header('location: ../view/changePassword.php');
        exit();
    }
    else{
        $newpassword = $_POST['newpassword'];
    }
    if(empty($_POST['confirmnewpassword'])){
        $newpasswordErr = "New Password field is empty";
        header('location: ../view/changePassword.php');
        exit();
    }
    else{
        $confirmnewpassword = $_POST['confirmnewpassword'];
    }

    if($newpassword === $confirmnewpassword){
        $isValid = true;
    }

    if($isValid == true){
        $data=file_get_contents("../model/users.json");
            $tempData=json_decode($data);
            
            if(!empty($tempData)){
                foreach($tempData as $tempObject){
                    if($tempObject->username==$username && $tempObject->email==$email){
                        $tempObject->password = $newpassword;
                        $tempObject->confirmpassword = $confirmnewpassword;
                    }
                }
            } 
            $data_en=json_encode($tempData,JSON_PRETTY_PRINT);
            file_put_contents("../model/users.json", $data_en);       
            header("location: ../view/login.php");
    }
    else{
        echo "invalid credentials";
        header("location: ../view/forgotPassword.php");
        exit();
    }

}
?>