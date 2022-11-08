<?php
session_start();

require_once '../model/ajson.php';
$db = new Json();

$redirectURL = '../view/dashboard.php';

if(isset($_POST['userSubmit'])){
	
	$id = $_POST['id'];
	$firstname = trim(strip_tags($_POST['firstname']));
	$lastname = trim(strip_tags($_POST['lastname']));
	$email = trim(strip_tags($_POST['email']));
	$phone = trim(strip_tags($_POST['phone']));
	$desease = trim(strip_tags($_POST['desease']));
	
	$id_str = '';
	if(!empty($id)){
		$id_str = '?id='.$id;
	}
    	
		$errorMsg = '';
	if(empty($firstname)){
        $errorMsg .= '<p>Please enter first name.</p>';
    }
        if(empty($lastname)){
        $errorMsg .= '<p>Please enter last name.</p>';
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg .= '<p>Please enter a valid email.</p>';
    }
	if(empty($phone)){
		$errorMsg .= '<p>Please enter contact no.</p>';
	}
	if(empty($desease)){
        $errorMsg .= '<p>Please enter desease name.</p>';
    }
	
	
	$userData = array(
		'firstname' => $firstname,
		'lastname' => $lastname,
		'email' => $email,
		'phone' => $phone,
        'desease' => $desease,
	);
	
	
	$sessData['userData'] = $userData;
	
	
    if(empty($errorMsg)){
        if(!empty($_POST['id'])){
            
            $update = $db->update($userData, $_POST['id']);
			
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Member data has been updated successfully.';
				
				
				unset($sessData['userData']);
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                
                $redirectURL = '../control/appointCrud.php'.$id_str;
            }
        }else{
            
            $insert = $db->insert($userData);
			
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Member data has been added successfully.';
				
				
				unset($sessData['userData']);
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                
                $redirectURL = '../control/appointCrud.php'.$id_str;
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>'.$errorMsg;
        
        
        $redirectURL = '../control/appointCrud.php'.$id_str;
    }
	
	
    $_SESSION['sessData'] = $sessData;
}elseif(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){
  
    $delete = $db->delete($_GET['id']);
	
    if($delete){
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'Member data has been deleted successfully.';
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }
    
   
    $_SESSION['sessData'] = $sessData;
}


header("Location:".$redirectURL);
exit();
?>