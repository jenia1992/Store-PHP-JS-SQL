<?php include_once('../db.php');
$allSet = 1;
if(isset($_POST["productId"])){
    $productId = $_POST["productId"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["productName"])){
    $productName = $_POST["productName"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["quantity"])){
    $quantity = $_POST["quantity"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["price"])){
    $price = $_POST["price"];
}
else{
   $allSet = 0; 
}
if(isset($_POST["minimum"])){
    $minimum = $_POST["minimum"];
}
else{
   $allSet = 0; 
}

if($allSet){
    $query = "INSERT INTO `inventory`(`product_id`, `product_name`, `quantity`, `price`, `minimum`) VALUES ($productId,'$productName',$quantity,$price,$minimum)";
    $result = mysqli_query($mysqli,$query);
    if($result){
        echo 'new product was added';
    }else{
        echo 'faild to insert new product';
    }
}


?>