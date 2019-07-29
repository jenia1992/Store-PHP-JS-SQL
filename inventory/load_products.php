<?php include_once('../db.php');

$query = "SELECT * FROM `inventory`";

if ($result = mysqli_query($mysqli, $query)) {

    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>actions</th>';
            echo '<th>product id</th>';
            echo '<th>product name</th>';
            echo '<th>quantity</th>';
            echo '<th>price</th>';
            echo '<th>minimum</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tfoot>';
        echo '<tr>';
            echo '<th>actions</th>';
            echo '<th>product id</th>';
            echo '<th>product name</th>';
            echo '<th>quantity</th>';
            echo '<th>price</th>';
            echo '<th>minimum</th>';
        echo '</tr>';
    echo '</tfoot>';
    echo '<tbody>';
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
            echo '<td><button class="btn btn-danger" onclick="remove_product('.$row["product_id"].')">delete</button>
            <br><br>';
            echo'<button class="btn btn-warning" onclick="edit_product_form('.$row["product_id"].')">edit</button></td>';
            echo '<td>'.$row["product_id"].'</td>';
            echo '<td>'.$row["product_name"].'</td>';
            echo '<td>'.$row["quantity"].'</td>';
            echo '<td>'.$row["price"].'</td>';
            echo '<td>'.$row["minimum"].'</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    

    /* free result set */
    mysqli_free_result($result);
}




?>