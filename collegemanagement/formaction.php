
<?php
require("admin/connection.php");

// Retrieving form data
$a = $_REQUEST["name"];
$b = $_REQUEST["email"];
$c = $_REQUEST["dob"];
$d = $_REQUEST["gender"];
$e = $_REQUEST["phonenumber"]; // Fixed the name to match your form field
$f = $_REQUEST["address"];
$g = $_REQUEST["course"];
$h = $_REQUEST["country"];
$i = $_REQUEST["state"];
$file = $_FILES["image"]["name"];

// Inserting data into the database
$res = $con->query("INSERT INTO formaction (`Name`, `email`, `dob`, `gender`, `pno`, `address`, `course`, `countries`, `state`, `image`)
   VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$file')");

// Moving uploaded image to the 'images' directory
move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $file);

// Success message
echo ("<script>
    alert('Details added successfully');
    window.location.href='form.php';
</script>");
?>
