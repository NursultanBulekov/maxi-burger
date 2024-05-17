<!-- Checking the database for working -->
<?php
include_once("../backends/connection-pdo.php");
if (!isset($_POST['email']) || !isset($_POST['password'])) {
	$_SESSION['msg'] = 'Недопустимые переменные! Обновите страницу!';
	header('location: index.php');
	exit();
}
/*Admin entering the system */
$email=$_POST['email'];
$password=$_POST['password'];
$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_login=$query->fetchAll(PDO::FETCH_ASSOC);
if (count($arr_login) > 0) {
	foreach($arr_login as $val)
	{  $tmp_name= $val['name']; }
	session_start();
    $_SESSION['username']=$tmp_name;
    $_SESSION['msg']="Успешно зашли в систему!";
    header('location: dashboard.php');
} else {
	session_start();
	$_SESSION['msg']="Некорректные данные!";
	header('location: index.php');
} ?>