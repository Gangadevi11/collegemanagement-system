
<?php
session_start();
require("connection.php");

$id = $_POST["id"];
$a = $_REQUEST["name"];
$b = $_REQUEST["email"];
$c = $_REQUEST["dob"];
$d = $_REQUEST["gender"];
$e = $_REQUEST["phonenumber"]; 
$f = $_REQUEST["address"];
$g = $_REQUEST["course"];
$h = $_REQUEST["country"];
$i = $_REQUEST["state"];
$file = $_FILES["image"]["name"];

if (empty($_FILES["image"]["name"])) {
    $res = $con->query("UPDATE formaction SET `name`='$a', `email`='$b', `dob`='$c', 
    `gender`='$d', `pno`='$e', `address`='$f', `course`='$g', `countries`='$h', `state`='$i' WHERE id='$id'");

    $count = mysqli_affected_rows($con);
} else {
    $file = $_FILES["image"]["name"];

    $res = $con->query("UPDATE formaction SET `name`='$a', `email`='$b', `dob`='$c', 
    `gender`='$d', `pno`='$e', `address`='$f', `course`='$g', `countries`='$h', `state`='$i', `image`='$file' WHERE id='$id'");

    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $file);
}

echo ("<script>
alert('Updated successfully');
window.location.href='usertable.php';
</script>");
?>
