<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT food.id, food.fname, food.description, food.fcost, categories.name
        FROM food
        LEFT JOIN categories
        ON food.cat_id = categories.id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="section white-text" style="background: #ffe001;">
	<div class="section">
		<h3>Блюда</h3>
	</div>
  <?php
    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: green; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }
    ?>
	<div class="section right" style="padding: 15px 25px;">
		<a href="food-add.php" class="waves-effect waves-light btn">Добавить новое</a>
	</div>
<!-- Displaying the existing foods in website -->
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Названия</th>
              <th>Описание</th>
              <th>Цена</th>
              <th>Меню</th>
              <th>Действия</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($arr_all as $key) {  ?>
          <tr>
            <td><?php echo $key['fname']; ?></td>
            <td><?php echo $key['description']; ?></td>
            <td><?php echo $key['fcost']; ?></td>
            <td><?php echo $key['name']; ?></td>
            <td><a href="../backends/admin/food-delete.php?id=<?php echo $key['id']; ?>"><span class="new badge" data-badge-caption="">
              Удалить
            </span></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
	</div>
</div>
<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>
