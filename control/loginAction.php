<?php
$username = "";
$usernameErr ="";
$passwordErr ="";
$loginErr ="";
$isLogin = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST['username'])){
        // $usernameErr = "Username cannot be empty";
        header("location: ../view/login.php?username=empty");
        exit();
    }
    else{
        $username = sanitize($_POST['username']);
    }
    if(empty($_POST['password'])){
        // $passwordErr = "Please provide a password";
        header("location: ../view/login.php?password=empty");
        exit();
    }
    else{
        $password = sanitize($_POST['password']);
    }
    
    $filename = "../model/users.json";
    $filecontent = file_get_contents($filename);
    $users = json_decode($filecontent);

    foreach($users as $user){
        if($user->username === $username && $user->password === $password){
            $isLogin = true;
        }
        elseif($user->username != $username && $user->password != $password){
            $isLogin = false;
            // echo "i am in";
        }
    }
    if($isLogin == true){     
        session_start();
        $_SESSION['username'] = $username;
        header("location: ../view/dashboard.php");
        echo 'login success';
    }
    if($isLogin == false){
        // $loginErr = "Invalid Credentials!";
        echo "<p>Login Failed. Please <a href='../view/login.php?login=fail'>try again</a></p>";
    }
}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>