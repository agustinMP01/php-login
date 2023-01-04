
<?php

require 'connection.php';

if (isset($_POST['user']) && isset($_POST['id'])) {
  $user = $_POST['user'];
  $id = $_POST['id'];

  echo "Are you sure you want to delete the user $user?<br>";

  if(isset($_POST['confirm'])) {
    $choice = $_POST['confirm'];
    global $id;
    

    if ($choice == "0") {
      header("Location: http://localhost/php-login/admin.php");
      exit();
    }

    $sql = "update users.users set deleted = 1 where id=$id";
    mysqli_query($conn, $sql);

    echo "Succesfully changed deleted $user<br>";
    header("Location: http://localhost/php-login/admin.php");
  }

}



echo '<form action="deleteUser.php" method="post">
<input type="radio" name="confirm" value="1"> Yes<br>
<input type="radio" name="confirm" value="0"> No<br>
<input type="hidden" name="id" value="' . $_POST['id'] . '">
<input type="hidden" name="user" value="' . $_POST['user'] . '">
<input type="submit" value="Submit">
</form>'

?>
