<?php 

    session_start();
    $username=isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $isInSassion = false;
    if(!isset($_SESSION['username'])){
        header("Location: ../view/login.php");
        // echo $username;
    }
    else{
        $isInSassion = true;
    }

    $data=file_get_contents("../model/users.json");
    $tempData=json_decode($data);

    if(!empty($tempData)){
        foreach($tempData as $tempObject){
            if($tempObject->username==$username){
                $firstname=$tempObject->firstname;
                $lastname=$tempObject->lastname;
                $username=$tempObject->username;
                $email=$tempObject->email;
                $gender=$tempObject->gender;
            }
        }
    }

?>

        <?php 

            
?>
