<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
<?php
require('../backends/connection-pdo.php');
$sql = 'SELECT orders.order_id, orders.user_name, orders.phnumber, orders.timestamp, food.fname FROM orders LEFT JOIN food ON orders.food_id = food.id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="section white-text" style="background: #ffe001;">

	<div class="section">
		<h3>Orders</h3>
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
    <!-- Displaying the ordered foods and names of users -->
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>ID Заказа</th>
              <th>Имя пользователя</th>
              <th>Номер телефона</th>
              <th>Названия блюды</th>
              <th>Время</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($arr_all as $key) {
          ?>
          <tr>
            <td><?php echo $key['order_id']; ?></td>
            <td><?php echo $key['user_name']; ?></td>
            <td><?php echo $key['phnumber']; ?></td>
            <td><?php echo $key['fname']; ?></td>
            <td><?php echo $key['timestamp']; ?></td>
            <td><a href="../backends/admin/order-delete.php?id=<?php echo $key['id']; ?>"><span class="new badge" data-badge-caption="">
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