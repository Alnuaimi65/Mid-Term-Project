<!doctype html>
<html lang="en">
<br>
<button onclick="location.href='../index.php'">Click here to See All Quotes Page</button>

<head>
	<!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/index.css" />
	<title>All Authors</title>
</head>
<body>
	<?php
	session_start();
	require('../auth/auth.php'); ?>
	<?php require('../csv_util.php'); ?>
	<h2>All Authors </h2>
	<?php
	if (is_logged()== true) {
		echo 'Logged in';
	}
	else {

		echo 'Logged out';
	}
	?>
	<br>
	<button onclick="location.href='../auth/signin.php'">Sign In</button>
	<button onclick="location.href='../auth/signup.php'">Sign Up</button>
	<button onclick="location.href='../auth/signout.php'">Sign Out</button>
	<?php
	$authors = readCSVFile("../authors.csv");
	$quotes = readCSVFile("../quotes.csv");
	foreach($authors as $key => $value):


		echo '<p ><a href="detail.php?index='.$key.'">'.$value[0].' '.$value[1].'</a></p>';
	endforeach;
	?>
	<button onclick="location.href='create.php'">Add Authors</button>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
