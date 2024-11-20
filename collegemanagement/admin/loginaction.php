
<?php 
session_start(); // Start the session

require("connection.php");

$U = $_REQUEST["email"]; 
$Pass = $_REQUEST["password"]; 

// Run the query first
$res = $con->query("SELECT * FROM users WHERE email='$U' AND password='$Pass'");
$count = $res->num_rows;

if ($count > 0) {
    
    $row = $res->fetch_assoc();
    $id = $row['id'];

    $_SESSION["teacher"] = $id; 
    header("location:main.php");
} else {
    echo ("<script>alert('wrong email and password');
    window.location.href='index.php';</script>");
}
?>
