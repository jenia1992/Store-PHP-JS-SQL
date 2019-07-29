<?php
include_once('../db.php');
session_start();
$allSet = 1;
if(isset($_POST["email"])){
    $email = $_POST["email"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["password"])){
    $password = $_POST["password"];
}
else{
   $allSet = 0; 
}
if($allSet){
    $query = "SELECT * FROM `users` WHERE email = '$email' ";
    if($result = mysqli_query($mysqli,$query)){
        $row = mysqli_fetch_assoc($result);
        if($row["password"] == $password){
            echo '1'; //succsess
            $_SESSION["id"] = 1;
        }
        else{
            echo '0'; //wrong password
        }
    }
}
?>