<?php include_once('../db.php');


$allSet=1;
if(isset($_POST["productId"])){
    $productId = $_POST["productId"];
}
else{
   $allSet = 0; 
}

if($allSet)
{
    $query = "SELECT * FROM `inventory` WHERE product_id = $productId ";
    $product;
    if($result = mysqli_query($mysqli,$query))
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $product['productId']=$row["product_id"];
            $product['productName']=$row["product_name"];
            $product['quantity']=$row["quantity"];
            $product['price']=$row["price"];
            $product['minimum']=$row["minimum"];

        }
    }
    echo json_encode($product);
    
}

?>