<?php include_once('../db.php');


$allSet = 1;
if(isset($_POST["id"])){
    $id = $_POST["id"];
}
else{
   $allSet = 0; 
}

if($allSet){
    $query = "DELETE FROM `customers` WHERE id = $id";
    $result = mysqli_query($mysqli,$query);
    if($result){
        echo 'customer was removed';
    }else{
        echo 'faild to remove customer';
    }
}



?>

