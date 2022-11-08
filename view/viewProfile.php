<?php 
include("../control/viewProfileAction.php");
?>

<?php include("../model/nav.php");?>
<?php //include("../model/footer.php");?>
    
        <form action="../control/viewProfileAction.php" method="GET">
           
                    <h1>doctors Information :</h1>
                    <span><b>First Name : </b></span> 
                    <span><?php if($isInSassion == true) echo $firstname;?> </span>
                    <br><br>
                    <span><b>Last Name : </b> </span>
                    <span><?php if($isInSassion == true) echo $lastname;?> </span>
                    <br><br>
                    <span><b>Gender : </b></span> 
                    <span><?php if($isInSassion == true) echo $gender;?> </span>
                    <br><br>

                    <span ><b>Email : </b> </span>
                    <span ><?php if($isInSassion == true) echo $email;?> </span><br><br>
              
            

            
            




        </form>
    
        <?php include("../model/footer.php");?>