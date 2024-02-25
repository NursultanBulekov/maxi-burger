<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MAXI BURGER - Fast Food Center</title>

	<!--Linking with fonts and styles  -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Yuji+Syuku&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>
	<!-- Requiring each needed fragments -->
	<?php require('frags/login-modal.php'); ?>
	<?php require('frags/register-modal.php'); ?>
	<?php require('frags/info-modal.php'); ?>
	<?php require('frags/navbar.php'); ?>
	<?php require('frags/banner-slider.php'); ?>
	<?php require('frags/description.php'); ?>
	<?php require('frags/cards.php'); ?>
	<?php require('frags/carousel.php'); ?>
	<?php require('frags/about.php'); ?>
	<?php require('frags/services.php'); ?>
	<?php require('frags/reviews.php'); ?>
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