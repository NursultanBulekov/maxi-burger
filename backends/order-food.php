<?php

session_start();

try {

    if (!file_exists('connection-pdo.php' ))
        throw new Exception();
    else
        require_once('connection-pdo.php' ); 
		
} catch (Exception $e) {

	$arr = array ('code'=>"0",'msg'=>"Ошибка. Повторите через некоторое время!");

	echo json_encode($arr);

	exit();
	
}

if (!isset($_SESSION['user']) || !isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "Вам нужно зайти в свой аккаунт чтобы заказать!";
	header('location: ../foods.php');
	exit();
}

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "Некорректные данные! Повторите попытку!";
	header('location: ../foods.php');
	exit();
}

date_default_timezone_set("Asia/Almaty");

$food_id = $_REQUEST['id'];

$user_name = $_SESSION['user'];

$user_id = $_SESSION['user_id'];

$phnumber = $_SESSION['number'];

$order_id = "MXBRGR" . strval(mt_rand(100000, 999999));

$timest = date("d:m:Y h:i:sa");


$sql = "INSERT INTO orders(order_id,user_id,phnumber,food_id,user_name,timestamp) VALUES(?,?,?,?,?,?)";

$query  = $pdoconn->prepare($sql);

if ($query->execute([$order_id, $user_id, $phnumber, $food_id, $user_name, $timest])) {

	$_SESSION['msg'] = 'Заказ принят! Номер заказа : '.$order_id;

	header('location: ../foods.php');
	
} else {

	$_SESSION['msg'] = 'Ошибка сервера. Повторите через некоторое время!';

	header('location: ../foods.php');

}