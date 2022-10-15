<html>
<?php
session_start();
require('auth.php');
if(isset($_SESSION['logged'])) {         //check if a user is logged in before allowing them to login
	if ($_SESSION['logged']==true) {
		echo 'User already logged in!!';
		header("location: ../index.php");
	}
}
signin();              //sign a user in using data from post form below.
?>

<form method="POST">
	<label for="email">Email:</label><br>
	<input type="email" name="email" /><br>
	<label for="password">Password</label><br>
	<input type="password" name="password" /><br>

	<input type="submit" value="submit" />
</form>
<h4><a href="../index.php">Return to Index</a></h4>
</html>
