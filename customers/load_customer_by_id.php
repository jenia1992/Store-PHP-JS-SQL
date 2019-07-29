<?php include_once('../db.php');


$allSet=1;
if(isset($_POST["id"])){
    $id = $_POST["id"];
}
else{
   $allSet = 0; 
}

if($allSet)
{
    $query = "SELECT * FROM `customers` WHERE id = $id ";
    $customer;
    if($result = mysqli_query($mysqli,$query))
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $customer['id']=$row["id"];
            $customer['firstName']=$row["first_name"];
            $customer['lastName']=$row["last_name"];
            $customer['address']=$row["address"];
            $customer['email']=$row["email"];
            $customer['phoneNumber']=$row["phone_number"];
            $customer['orders']=$row["orders"];


        }
    }
    echo json_encode($customer);
    
}

?>