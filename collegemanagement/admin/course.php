<?php

require("connection.php");

$a = $_REQUEST["name"];
$b = $_REQUEST["price"];
$c = $_REQUEST["description"];
$d = $_FILES["image"]["name"];
$e=$_REQUEST["number of person"];
$f=$_REQUEST["price per person"];

$res = $con->query("INSERT INTO form (`course name`, `course price`, `course description`, `image`,`number`,`price`)
VALUES ('$a', '$b', '$c', '$d','$e','$f')");

move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $d);

 echo ("<script>
    alert('Details added successfully');
    window.location.href='form.php';
</script>");
?>
