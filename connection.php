<?php 
$servername = "localhost";
$username = "root";
$password = "";

// * Create connection (procedural)
$conn = mysqli_connect($servername, $username, $password);

// * Create connection (OOP)
// $conn = new mysqli($servername, $username, $password);

// * Check connection (procedural)
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// * Check connection (OOP)
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
echo "Connected to DB!<br>";
?>