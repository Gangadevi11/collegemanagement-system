
<?php
session_start(); // Ensure session is started

require("connection.php");

// Retrieving form data
$a = $_REQUEST["name"];
$b = $_REQUEST["email"];
$c = $_REQUEST["dob"];
$d = $_REQUEST["gender"];
$e = $_REQUEST["course"];
$f = $_REQUEST["address"];
$g = $_REQUEST["phone"];
$file = $_FILES["image"]["name"];
$id = $_SESSION["teacher"]; // Make sure there's a semicolon here

// Insert query
$res = $con->query("INSERT INTO forms (`Full Name`, `Email`, `Date of Birth`, `Gender`, `Course`, `Address`, `Phone Number`, `image`, `id`)
   VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$file', '$id')");

move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $file);

// Success message
echo ("<script>
    alert('Details added successfully');
    window.location.href='forms.php';
</script>");
?>
