<?php
session_start();
$user = $_SESSION['user'];
echo "Welcome $user!<br>";

require 'connection.php';

$id = $_POST['id'];
if (!$id) {
  header("Location: http://localhost/php-login/index.php");
}

$query = mysqli_query($conn ,"select username from users.users where id = $id limit 1;");
echo "Fetching results...<br>";
$row = $query->fetch_row();

if (!$row) {
  die("No username match the id");
}

echo "The username with id $id is: ";
echo $row[0];
// * Close connection (procedural)
mysqli_close($conn);

// * Close connection (OOP)
// $conn->close();
?>