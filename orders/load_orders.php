<?php include_once("../db.php"); 

if($result = mysqli_query($mysqli,"SELECT * FROM orders")){
    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>order number</th>';
            echo '<th>customer name</th>';
            echo '<th>product name</th>';
            echo '<th>quantity</th>';
            echo '<th>status</th>';
            echo '<th>comment</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tfoot>';
        echo '<tr>';
            echo '<th>order number</th>';
            echo '<th>customer name</th>';
            echo '<th>product name</th>';
            echo '<th>quantity</th>';
            echo '<th>status</th>';
            echo '<th>comment</th>';
        echo '</tr>';
    echo '</tfoot>';
    echo '<tbody>';
        while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
                echo '<td>'.$row["order_number"].'</td>';
                echo '<td>'.$row["customer_name"].'</td>';
                echo '<td>'.$row["product_name"].'</td>';
                echo '<td>'.$row["quantity"].'</td>';
                echo '<td>'.$row["status"].'</td>';
            if(!empty($row["comment"])){echo '<td>'.$row["comment"].'</td>'; }else echo 'no comment';
            echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
    
    /* free result set */
    mysqli_free_result($result);
}




?>