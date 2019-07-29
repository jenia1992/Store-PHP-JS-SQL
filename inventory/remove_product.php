<?php include_once('../db.php');


$allSet = 1;
if(isset($_POST["productId"])){
    $productId = $_POST["productId"];
}
else{
   $allSet = 0; 
}

if($allSet){
    $query = "DELETE FROM `inventory` WHERE product_id = $productId";
    $result = mysqli_query($mysqli,$query);
    if($result){
        echo 'product was removed';
    }else{
        echo 'faild to remove product';
    }
}



?>

