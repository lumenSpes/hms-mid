<?php
// session_start();

$sessionData = !empty($_SESSION['sessionData'])?$_SESSION['sessionData']:'';

require_once '../model/ajson.php';
$db = new Json();

$members = $db->getRows();

if(!empty($sessionData['status']['msg'])){
    $statusMsg = $sessionData['status']['msg'];
    $statusMsgType = $sessionData['status']['type'];
    unset($_SESSION['sessionData']['status']);
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
       table, th, td{
       border:1px solid black;
       }
</style>
<head>
    <title></title>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<h1>APPOINTMENT LIST</h1>
	
	
        
            <!-- <h5>ADMIN</h5> -->
            
            
                <a style="display:none;" href="../control/appointCrud.php" > NEW APPOINTMENT</a>

            </div>
        </div>
        
        
        <table >
            
                <tr>
                    <th>#</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>DESEASE NAME</th>
                    <th>ACTION</th>
                </tr>
            
            <tbody id="userData">
                <?php if(!empty($members)){ $count = 0; foreach($members as $row){ $count++; ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['desease']; ?></td>
                    <td>
                       
                        <a href="../control/appointAction.php?action_type=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');">delete</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="6">No member(s) found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    <a style="display:none;" href="../view/dashboard.php"> BACK</a>
</body>
</html>