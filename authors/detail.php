<!doctype html>
<html lang="en">
<head>
	<!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/index.css" />
	<title>Authors</title>
</head>
<body>
	<?php
	session_start();
	require('../csv_util.php');
	require('../auth/auth.php');

	$idx = $_GET['index'];
	$authors = readCSVFile("../authors.csv");
	$quotes = readCSVFile("../quotes.csv");
	echo '<h2>'.$authors[$idx][0].' '.$authors[$idx][1].'</h2>';
	if (isset($_GET['delete'])) {
		header('Location: \Mid Term Project\authors\delete.php?index='.$idx.'');
	}
	if (isset($_GET['modify'])) {
		header('Location: \Mid Term Project\authors\modify.php?index='.$idx.'');
	}
	?>

	<button onclick=<?php echo "location.href=\"detail.php?index=".$idx."&delete=true\""; ?>>Delete Author</button>
	<button onclick=<?php echo "location.href=\"detail.php?index=".$idx."&modify=true\""; ?>>Modify Author</button>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
