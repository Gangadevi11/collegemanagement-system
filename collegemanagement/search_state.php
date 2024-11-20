
<?php
require('admin/connection.php'); 

$country = $_POST['country']; 


if ($country) {
    $res = $con->query("SELECT * FROM states WHERE country_id='$country'");
    
    if (!$res) {
        echo "Error in SQL query: " . $con->error; // Output SQL error
    } else {
        while ($row = mysqli_fetch_array($res)) {
            echo '<option value="'.$row['stat_id'].'">'.$row['sname'].'</option>';
        }
    }
} else {
    echo "No country selected";
}
?>
