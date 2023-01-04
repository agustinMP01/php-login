<?php

require 'connection.php';

if(isset($_POST['newUser']) && isset($_POST['newPass']))
{
  $newUser = $_POST['newUser'];
  $newPass = $_POST['newPass'];
  $sql = "insert into users.users(`username`, `password`) values ('$newUser','$newPass')";

  mysqli_query($conn, $sql);
  $check = mysqli_query($conn, "select * from users.users where username = '$newUser' and password = '$newPass';");
  
  if(!$check) {
    echo 'Failed to add.<br>';
    header("Location: http://localhost/php-login/admin.php", true);
  } else {
    echo 'Added succesfully<br>';
    echo $newUser;
    echo '<br>';
    echo $newPass;
  }
}
?>

<form action="" method="post">
 <p>New Username: <input type="text" name="newUser" /></p>
 <p>New Password: <input type="text" name="newPass" /></p>
 <p><input type="submit" /></p>
</form>