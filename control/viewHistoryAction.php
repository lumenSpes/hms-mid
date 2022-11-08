<?php
    
session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(empty($_POST['patientemail'])){
            // $emailErr = "Email Field empty";
            header("location: ../view/viewHistory.php?email=empty");
            exit();
        }
        else{
            $patientemail = $_POST['patientemail'];
            if(!filter_var($patientemail, FILTER_VALIDATE_EMAIL)){
                    // $emailErr = "Provide a valid email address.";
                header("location: ../view/viewHistory.php?email=invalid");
                exit();
            }
            
            
        }




        $data=file_get_contents("../model/patientlist.json");
        $tempData=json_decode($data);
    
        if(!empty($tempData)){
            foreach($tempData as $tempObject){
                if($tempObject->email==$patientemail){
                    $_SESSION['patientfirstname'] = $firstname=$tempObject->firstname;
                    $_SESSION['patientlastname'] = $lastname=$tempObject->lastname;
                    $_SESSION['patientage'] = $age=$tempObject->age;
                    $_SESSION['patientemail'] = $email=$tempObject->email;
                    $_SESSION['patientgender'] = $gender=$tempObject->gender;
                    $_SESSION['patientphone'] = $phone=$tempObject->phone;
                    $_SESSION['patientdesease'] = $desease=$tempObject->desease;
                }
            }
        }
                    
        header('location:../view/showPatient.php');

        function sanitize($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

?>