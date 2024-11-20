
<?php 
require("admin/connection.php");
$U = $_REQUEST["email"];
$Pass = $_REQUEST["password"];

$res = $con->query("SELECT * FROM users WHERE email='$U' AND password='$Pass'");
$count = $res->num_rows;

if ($count > 0) {

    header("location:index.php");
} else {
    echo ("<script>alert('wrong email and password');
    window.location.href='login.php';</script>");
}
?>
