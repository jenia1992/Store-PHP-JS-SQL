<?php include_once('../db.php');
$allSet = 1;

if(isset($_POST["oldId"])){
    $oldId = $_POST["oldId"];
}
else{
   $allSet = 0; 
}
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
else{
   $allSet = 0; 
}
if(isset($_POST["phoneNumber"])){
    $phoneNumber = $_POST["phoneNumber"];
}
else{
   $allSet = 0; 
}


if($allSet){
    if($id == $oldId){
        $query = "UPDATE `customers` SET `first_name`='$firstName',`last_name`='$lastName',`address`='$address',`email`='$email',`phone_number`='$phoneNumber' WHERE id = $id";
        $result = mysqli_query($mysqli,$query);
        if($result){
            echo 'customer details updated successfully';
        }else{
            echo 'faild to update customer';
    }
    }else{
        ob_start();    // start output buffering
        include("add_customer.php"); // new customer created
        $returned_value = ob_get_contents();    // get contents from the buffer
        ob_end_clean();    // stop output buffering
        if($returned_value == "new customer was added"){
            $_POST["id"] = $oldId;
            ob_start();    // start output buffering
            include("remove_customer.php"); // remove old customer
            ob_end_clean();    // stop output buffering
        }
    }
    
    
    
    
}


?>