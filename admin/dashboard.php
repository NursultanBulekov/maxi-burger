<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
<?php
if (isset($_SESSION['msg'])) {
	echo '<div class="section white-text" style="background: green;">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
} ?>
<!-- The main controlling panel of website and visiting links to other control panels -->
<div class="section black-text center" style="background: #ffe001; margin-top: 20px;">
	<h4>Центр управления</h4>
	<div class="row" style="padding: 50px;">
		<div class="col s12">
			<a class="dash-btn" href="food-list.php"><div class="sec black-text" style="margin: 15px; padding: 40px;border: 2px solid black; 
			border-radius: 20px; font-size: 20px; background: #efed77;">Блюда</div></a>
			<a class="dash-btn" href="category-list.php"><div class="sec black-text" style="margin: 15px; padding: 40px;border: 2px solid black; 
			border-radius: 20px; font-size: 20px; background: #efed77;">Меню</div></a>
			<a class="dash-btn" href="order-list.php"><div class="sec black-text" style="margin: 15px; padding: 40px;border: 2px solid black; 
			border-radius: 20px; font-size: 20px; background: #efed77;">Заказы</div></a>
		</div>
	</div>
</div>
<?php require('layout/footer.php'); ?>
