<?php include_once('../db.php');

$query = "SELECT * FROM `customers`";

if ($result = mysqli_query($mysqli, $query)) {

    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>actions</th>';
            echo '<th>id</th>';
            echo '<th>name</th>';
            echo '<th>address</th>';
            echo '<th>email</th>';
            echo '<th>phone number</th>';
            echo '<th>orders</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tfoot>';
        echo '<tr>';
            echo '<th>actions</th>';
            echo '<th>id</th>';
            echo '<th>name</th>';
            echo '<th>address</th>';
            echo '<th>email</th>';
            echo '<th>phone number</th>';
            echo '<th>orders</th>';
        echo '</tr>';
    echo '</tfoot>';
    echo '<tbody>';
    /* fetch associative array *///get everytime one row from table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
            echo '<td><button class="btn btn-danger" onclick="remove_customer('.$row["id"].')">delete</button>
            <br><br>';
            echo'<button class="btn btn-warning" onclick="edit_customer_form('.$row["id"].')">edit</button></td>';
            echo '<td>'.$row["id"].'</td>';
            echo '<td>'.$row["first_name"]." ".$row["last_name"].'</td>';
            echo '<td>'.$row["address"].'</td>';
            echo '<td>'.$row["email"].'</td>';
            echo '<td>'.$row["phone_number"].'</td>';
            echo '<td>'.$row["orders"].'</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    

    /* free result set */
    mysqli_free_result($result);
}




?>