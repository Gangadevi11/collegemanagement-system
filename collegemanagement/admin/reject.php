<?php
require("connection.php");

$id=$_REQUEST["id"];
$res=$con->query("update forms set `status`='0' where id='$id'");
$count=mysqli_affected_rows($con);
 if($count>=0)
 {
    echo("rejected");
 }