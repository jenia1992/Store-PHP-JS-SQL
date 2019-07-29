<?php include_once('../db.php');

$checkAll = 1;

if(isset($_POST["customerName"])){
    $customerName = $_POST["customerName"]; //varchar
}else{
    $checkAll = 0;
}
if(isset($_POST["customerId"])){
    $customerId = $_POST["customerId"]; //int
}else{
    $checkAll = 0;
}
if(isset($_POST["productName"])){
    $productName = $_POST["productName"]; //varchar
}else{
    $checkAll = 0;
}
if(isset($_POST["quantity"])){
    $quantity = $_POST["quantity"]; //int
}else{
    $checkAll = 0;
}
if(isset($_POST["status"])){
    $status = $_POST["status"]; //varchar
}else{
    $checkAll = 0;
}
if(isset($_POST["comment"])){
    $comment = $_POST["comment"]; //varchar
}else{
    $checkAll = 0;
}



if($checkAll){
    $query = "INSERT INTO `orders`( `customer_name`, `customer_id`, `product_name`, `quantity`, `status`, `comment`) VALUES ('$customerName',$customerId,'$productName',$quantity,'$status','$comment')";
    $result = mysqli_query($mysqli,$query);
    if(!$result){
        echo "failed to add order to database";
    }else{
        echo "order added successfully";
    }
}else{
    echo "missing inputs";
}

?>