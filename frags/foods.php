<?php
/* Connecting the page with local Database */
require('backends/connection-pdo.php');
if (isset($_REQUEST['id'])) {
	$sql = 'SELECT * FROM food WHERE cat_id = "'.$_REQUEST['id'].'"';
} else {
	$sql = 'SELECT * FROM food';
}
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<section class="fcategories">
	<div class="container">
		<?php
			if (isset($_SESSION['msg'])) {
				echo '<div class="section red center" style="margin: 10px; padding: 3px 10px; margin-top: 35px; 
				border: 2px solid black; border-radius: 5px; color: white;">
						<p><b>'.$_SESSION['msg'].'</b></p>
					</div>';

				unset($_SESSION['msg']);
			}
		?>

		<div class="section white center">
			<h3 class="header">Меню</h3>
		</div>
		<?php if (count($arr_all) == 0) {
	echo '<div class="section gray center" style="border: 1px solid black; border-radius: 5px;">
			<p class="header">Извините. Нет меню для отображения</p>
		</div>';
} else {  ?>
<?php for ($i=1; $i <= count($arr_all); ) { ?>
		<div class="row">
			<?php for ($j=1; $j <= 10; $j++) { ?>
				<?php if ($i+$j-2 == count($arr_all)) {
					break;
				}  ?>
			<div class="col s12 m4">
				<div class="card">
					<!-- Displaying the foods added by Admin and giving them pictures from existing files -->
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator" src="images/burgers<?php echo $j; ?>.jpg">
				    </div>
				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" >
						  <h4><b> <?php echo $arr_all[$i+$j-2]['fname']; ?> </b></h4>
						</a>
					</span>
					<span class="card-title activator grey-text text-darken-4">
						  <?php echo $arr_all[$i+$j-2]['fcost'] . "₸"; ?> 
						</a>
					</span>
				      <div class="card-content">
			          <p> <?php echo $arr_all[$i+$j-2]['description']; ?> </p>
			        </div>
			        <div class="card-content center">
			          <a href="backends/order-food.php?id=<?php echo $arr_all[$i+$j-2]['id']; ?>" 
					  style="background: #5ac31a;" class="btn waves-effect waves-block waves-light" 
					  href="">Заказать сейчас!</a>
			        </div>
				    </div>
				  </div>
			</div>
			<?php } ?>
			<?php $i = $i + 9; ?>
		</div>
		<?php
				}
			}
		?>
	</div>
</section>
