<?php include_once('../db.php');

$allSet=1;
if(isset($_POST["orderNumber"])){
    $orderNumber = $_POST["orderNumber"];
}
else{
   $allSet = 0; 
}

if($allSet)
{
    $query = "SELECT * FROM `orders` WHERE order_number = $orderNumber ";
    $order;
    if($result = mysqli_query($mysqli,$query))
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $order['orderNumber']=$row["order_number"];
            $order['customerName']=$row["customer_name"];
            $order['customerId']=$row["customer_id"];
            $order['productName']=$row["product_name"];
            $order['quantity']=$row["quantity"];
            $order['status']=$row["status"];
            $order['comment']=$row["comment"];

        }
    }
    echo json_encode($order);
    
}

?>