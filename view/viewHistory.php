<?php
session_start();
?>
<form action="../control/viewHistoryAction.php" method="post">
    <label for="patientemail">Patient Email</label>
    <input type="text" name="patientemail" id="patientemail">
    <br><br>
    
    <input type="submit" value="Submit">
</form>
<br><br>
<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl,"pervpass=empty") == true){
        echo "please fillup properly";
    }
    elseif(strpos($fullUrl,"mismatch=corrct") == true){
        echo "New password and Confirm Password dont match";
    }
    ?>
