<?php
session_start();
require("connection.php");

$id = $_REQUEST["id"];
$res=$con->query("SELECT * FROM `forms` where id='$id'");
$count=$res->num_rows;
if($count>0)
   $row=$res->fetch_assoc();
$upload=$row["image"];
unlink("images/$upload");
$res = $con->query("DELETE FROM forms WHERE id='$id'");

$count = mysqli_affected_rows($con);


if ($count > 0) {
    echo ("<script>
    alert('Record deleted successfully');
    window.location.href='tables.php';
    </script>");
} else {
    echo ("<script>
    alert('Error record');
    window.location.href='tables.php';
    </script>");
}
?>
