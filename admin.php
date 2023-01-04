<?php 
session_start();

require 'connection.php';

$usersQuery = mysqli_query($conn, 'select * from users.users where deleted = 0');
?>
<table border="1">
	<thead>
		<tr>
			<td>ID</td>
			<td>Username</td>
      <td>Password</td>
		</tr>
	</thead>
	<tbody>
      <?php
      while ($row = mysqli_fetch_assoc($usersQuery)) {
        echo '<tr>';
        echo '<td>'. $row['ID'] .'</td>';
        echo '<td>'. $row['username'] .'</td>';
        echo '<td>'. $row['password'] .'</td>';
        echo '<td>'. '<form action="updateUser.php" method="post">
        <input type="hidden" name="id" value="' . $row['ID'] . '">
        <input type="hidden" name="user" value="' . $row['username'] . '">
        <input type="submit" value="Update">

      </form>' . '<form action="deleteUser.php" method="post">
      <input type="hidden" name="id" value="' . $row['ID'] . '">
      <input type="hidden" name="user" value="' . $row['username'] . '">
      <input type="submit" value="Delete">
      
    </form>' . '</td>';
        echo '</tr>';
      }
      ?>
		
	</tbody>
</table>
<form action="addUser.php" method="post">
  <input type="submit" value="Add new user">
</form>

