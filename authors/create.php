<!doctype html>
<html lang="en">
<head>
	<!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/index.css" />
	<title>New Authors Form</title>
</head>
<body>
	<?php session_start();
	require('../csv_util.php');
	require('../auth/auth.php');
	if (is_logged()==true){ ?>

		<?php	if (isset($_POST['form_submitted'])):
			$row = array(
				$_POST['fname'],
				$_POST['lname']
			);
			$quotes = writeToCSVFile("../authors.csv",$row);
			?>
			<h2>Authors <?php echo $_POST['fname'].' '.$_POST['lname']; ?> </h2>
			<h2>Has been added to CSV file.</h2>
			<p>Go <a href="\Mid Term Project\authors\">back</a> to the authors page</p>
			<p>Go <a href="\Mid Term Project\">back</a> main page</p>
		<?php else: ?>
			<h2>New Authors </h2>
			<form action="create.php" method="POST">
				Author First Name:
				<input type="text" name="fname">
				<br>
				Author Last Name:
				<input type="text" name="lname">
				<br>
				<input type="hidden" name="form_submitted" value="1" />
				<input type="submit" value="Add Author">
			</form>
		<?php endif; ?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
<?php }
else {
	echo "Must be logged in";
}
?>
<h3><a href="index.php">Return to Index</a></h3>
</html>
