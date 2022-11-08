<?php
    session_start();
    $isupdated = false;
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(empty($_POST['previouspassword'])){
            // $prevpasswordErr ='Please provide your previous password!!';
            header("location: ../view/changePassword.php?pervpass=empty");
            exit();
            $isupdated = false;
        }
        else{
            $previouspassword = sanitize($_POST['previouspassword']);
            
        }
        if(empty($_POST['newpassword'])){
            // $newpasswordErr = "Please provide a password!!";
            header("location: ../view/changePassword.php?pervpass=empty");
            exit();
            // header("location: ../view/changePassword.php");
            $isupdated = false;
        }
        else{
            $newpassword = sanitize($_POST['newpassword']);
            
        }
        if(empty($_POST['confirmpassword'])){
            // $confirmpasswordErr = "The password do not match!! Please try again";
            // header("location: ../view/changePassword.php");
            header("location: ../view/changePassword.php?pervpass=empty");
            exit();
            $isupdated = false;
        }
        else{
            $confirmpassword = sanitize($_POST['confirmpassword']);
            
        }
        if($newpassword === $confirmpassword){
            $isupdated = true;
        }
        else{
            // $mismatcherr = "New password and Confirm Password does not match"; 
            header("location: ../view/changePassword.php?mismatch=corrct");
            exit();
        }
        if($isupdated === true){
            $data=file_get_contents("../model/users.json");
            $tempData=json_decode($data);
            
            if(!empty($tempData)){
                foreach($tempData as $tempObject){
                    if($tempObject->password==$previouspassword){
                        echo "i am IN";
                        $tempObject->password = $newpassword;
                        $tempObject->confirmpassword = $confirmpassword;
                    }
                }
            } 
            $data_en=json_encode($tempData,JSON_PRETTY_PRINT);
            file_put_contents("../model/users.json", $data_en);       
            header("location: ../view/dashboard.php");
        }
        
    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>