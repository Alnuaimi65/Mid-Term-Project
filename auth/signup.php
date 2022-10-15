<?php
session_start();
require('auth.php');
signup();               //sign a user up using data from post form below.
?>
<form method="POST">
	<label for="email">Email:</label><br>
	<input type="email" name="email" /><br>
	<label for="password">Password</label><br>
	<input type="password" name="password" /><br>

	<input type="submit" value="submit" />
</form>
<h4><a href="../index.php">Return to Index</a></h4>
