<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maxiburger - Categories!</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="css/materialize.min.css">

	<link rel="stylesheet" href="css/style.css">


</head>
<body>

	<?php require('frags/login-modal.php'); ?>


	<?php require('frags/register-modal.php'); ?>


	<?php require('frags/info-modal.php'); ?>


	<?php require('frags/navbar.php'); ?>


	<?php require('frags/banner-slider.php'); ?>




	<?php require('frags/categories.php'); ?>








	<?php require('frags/footer.php'); ?>



	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

    <script src="js/materialize.min.js"></script>

    <script src="js/loaders.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>
