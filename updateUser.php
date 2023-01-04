
<?php

require 'connection.php';

if (isset($_POST['user']) && isset($_POST['id'])) {
  $user = $_POST['user'];
  $id = $_POST['id'];
  echo "Updating user $user<br>";


  if(isset($_POST['newUser'])) {
    $newUser = $_POST['newUser'];
    global $id;

    $sql = "update users.users set username = '$newUser' where id=$id";
    mysqli_query($conn, $sql);

    $check = mysqli_query($conn, "select * from users.users where username='$newUser'");

    if (!$check) {
      echo "Error at updating.";
      header("Location: http://localhost/php-login/updateUser.php", true);
    } else {
      echo "Succesfully changed $user to $newUser<br>";
    }
  }
}

echo '<form action="" method="post">
  <p>New Username: <input type="text" name="newUser" /></p>
  <input type="hidden" name="id" value="' . $_POST['id'] . '">
  <input type="hidden" name="user" value="' . $_POST['user'] . '">
  <p><input type="submit" /></p>
</form>'

?>