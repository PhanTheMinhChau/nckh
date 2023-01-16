<?php 
$servername = "183.80.98.122";
$username = "root";
$password = "12345678";
$dbname = "dtbase_nckh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>