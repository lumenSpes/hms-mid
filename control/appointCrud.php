<?php
session_start();

$sessionData = !empty($_SESSION['sessionData'])?$_SESSION['sessionData']:'';

$memberData = $userData = array();
if(!empty($_GET['id'])){
   
    include '../model/ajson.php';
    $db = new Json();   
  
    $memberData = $db->getSingle($_GET['id']);
}
$userData = !empty($sessionData['userData'])?$sessionData['userData']:$memberData;
unset($_SESSION['sessionData']['userData']);
$actionLabel = !empty($_GET['id'])?'Edit':'Add';
if(!empty($sessionData['status']['msg'])){
    $statusMsg = $sessionData['status']['msg'];
    $statusMsgType = $sessionData['status']['type'];
    unset($_SESSION['sessionData']['status']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>APPOINTMENT NANAGRMRNT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <h1>APPOINTMENT NANAGRMRNT</h1>   
    
             <form method="post" action="../control/appointAction.php">
                
                    <label>First Name</label>
                    <input type="text"  name="firstname" placeholder="Enter your first name" value="<?php echo !empty($userData['firstname'])?$userData['firstname']:''; ?>">
                <br></br>

                <label>Last Name</label>
                    <input type="text"  name="lastname" placeholder="Enter your last name" value="<?php echo !empty($userData['lastname'])?$userData['lastname']:''; ?>">
                <br></br>
                
                    <label>Email</label>
                    <input type="email"  name="email" placeholder="Enter your email" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>">
                <br></br>
                
                    <label>Phone</label>
                    <input type="text"  name="phone" placeholder="Enter contact no" value="<?php echo !empty($userData['phone'])?$userData['phone']:''; ?>" required="">
                <br></br>
                
                    <label>Desease NAME</label>
                    <input type="text" name="desease" placeholder="Enter desease name" value="<?php echo !empty($userData['desease'])?$userData['desease']:''; ?>">
                <br></br>
                
                <a href="../view/appointManage.php" >Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($memberData['id'])?$memberData['id']:''; ?>">
                <input type="submit" name="userSubmit"  value="Submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>