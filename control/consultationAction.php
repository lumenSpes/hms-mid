<?
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['email']) || empty($_POST['meetingLink']) || empty($_POST['meetinginstructions'])){
        header('location: ../view/consultation.php?consult=empty');
        exit();
    }
    else{
        $patientemail = sanitize($_POST['email']);
        $meetingLink = sanitize($_POST['meetingLink']);
        $meetinginstructions = sanitize($_POST['meetinginstructions']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: ../view/consultation.php?consultation=email");
            exit();
        }
    }

    $filename = "../model/consultation.json";
    if(!file_exists($filename)){
        $file = fopen($filename, "w");
        $data = array(array("email" => $patientemail,"meetingLink" => $meetingLink,  
             "meetinginstructions" => $meetinginstructions));
        $data = json_encode($data);
        fwrite($file, $data);
        fclose($file);
        // echo " registration successfull";
        header("loacation: ../view/dashboard.php");
    }
    if(file_exists($filename)){
        $previousdata = file_get_contents($filename);
        $previousarraydata = json_decode($previousdata);
        $newdata = array("email" => $patientemail,"meetingLink" => $meetingLink,  
        "meetinginstructions" => $meetinginstructions);
        $previousarraydata[] = $newdata;
        $data = json_encode($previousarraydata);
        if(file_put_contents($filename,$data)){
            header("location: ../view/dashboard.php");
            // echo " registration successfull again";
            // fclose($filename);
        } 
        else{
            // echo " registration unsuccessfull";
            header("location: ../view/consultation.php?insertion=failed");
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