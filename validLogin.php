<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

require 'connection.php';

$query = mysqli_query($conn, "select id from users.users where username = '$user' and password = '$pass';");
$row = $query->fetch_row();
if (!$row) {
  header("Location: http://localhost/php-login/login.php", true);
  exit();
}

echo "Logged in succesfully<br>";
session_start();
$_SESSION['id'] = session_id();
$_SESSION['user'] = $user;
$session_id = $_SESSION['id'];
header("Location: http://localhost/php-login/index.php")

?>