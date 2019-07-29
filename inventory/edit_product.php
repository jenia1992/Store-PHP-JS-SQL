<?php include_once('../db.php');
$allSet = 1;
if(isset($_POST["oldId"])){
    $oldId = $_POST["oldId"];
}
else{
   $allSet = 0; 
}
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
    if($productId == $oldId){
        $query = "UPDATE `inventory` SET `product_id`=$productId,`product_name`='$productName',`quantity`=$quantity,`price`=$price,`minimum`=$minimum WHERE product_id = $productId";
        $result = mysqli_query($mysqli,$query);
        if($result){
            echo 'product details updated successfuly';
        }else{
            echo 'faild to update product';
        }
    }else{
        ob_start();    // start output buffering
        include("add_product.php"); // new product created
        $returned_value = ob_get_contents();    // get contents from the buffer
        ob_end_clean();    // stop output buffering
        if($returned_value == "new product was added"){
            $_POST["productId"] = $oldId;
            ob_start();    // start output buffering
            include("remove_product.php"); // remove old product
            ob_end_clean();    // stop output buffering
        }
    }
    
}


?>