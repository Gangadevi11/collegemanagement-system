<?php
require("connection.php");

$id=$_REQUEST["id"];
$res=$con->query("update forms set `status`='1' where id='$id'");
$count=mysqli_affected_rows($con);
if($count>=0)
{
    echo("status approved");
}else{
    echo("rejected");
}
