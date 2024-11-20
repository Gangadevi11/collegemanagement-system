<?php
session_start();
require("connection.php");

$id=$_POST["id"];
$a=$_REQUEST["name"];
$b=$_REQUEST["email"];
$c=$_REQUEST["dob"];
$d=$_REQUEST["gender"];
$e=$_REQUEST["course"];
$f=$_REQUEST["address"];
$g=$_REQUEST["phone"];
$file=$_FILES["image"]["name"];
if(empty($_FILES["image"]["name"]))
{
$res=$con->query("update forms set `Full Name`='$a',`Email`='$b',`Date of Birth`='$c',
`Gender`='$d',`Course`='$e',`Address`='$f',`Phone Number`='$g' where id='$id'");

$count=mysqli_affected_rows($con);
}
else{
    $file=$_FILES["image"]["name"];
    $res=$con->query("update forms set `Full Name`='$a',`Email`='$b',`Date of Birth`='$c',
    `Gender`='$d',`Course`='$e',`Address`='$f',`Phone Number`='$g',`image`='$file' where id='$id'");
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$file);
}
echo  ("<script>
alert('updated successfully');
window.location.href='tables.php';
</script>");
?>