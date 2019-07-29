<?php include_once('../db.php');
$allSet = 1;
if(isset($_POST["id"])){
    $id = $_POST["id"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["firstName"])){
    $firstName = $_POST["firstName"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["lastName"])){
    $lastName = $_POST["lastName"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["address"])){
    $address = $_POST["address"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["phoneNumber"])){
    $phoneNumber = $_POST["phoneNumber"];
}
else{
   $allSet = 0; 
}

if($allSet){
    $query = "INSERT INTO `customers`(`id`, `first_name`, `last_name`, `address`, `email`,`phone_number`) VALUES ($id,'$firstName','$lastName','$address','$email','$phoneNumber')";
    $result = mysqli_query($mysqli,$query);
    if($result){
        echo 'new customer was added';
    }else{
        echo 'faild to insert new customer';
    }
}


?>