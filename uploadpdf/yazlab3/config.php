<?php 

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "file_upload_tutorial";


$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$base_url = "http://localhost/yazlab3/"; // Website url


?>