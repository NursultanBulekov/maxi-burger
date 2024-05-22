<?php

session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'Ошибка сервера! Повторите попытку через некоторое время!';

	header('location: ../../admin/category-list.php');

	exit();
	
}

if (!isset($_POST['name']) || !isset($_POST['short_desc']) || !isset($_POST['long_desc'])) {

	$_SESSION['msg'] = 'Недопустимые переменные! Обновите страницу и повторите попытку!';

	header('location: ../../admin/category-list.php');

	exit();
}

$regex = '/^[(A-Z)?(a-z)?(А-Я)?(а-я)?(0-9)?\-?\_?\.?\,?\s*]+$/u';


if (!preg_match($regex, $_POST['name']) || !preg_match($regex, $_POST['short_desc']) || !preg_match($regex, $_POST['long_desc'])) {

	$_SESSION['msg'] = 'Некорректные данные!';

	header('location: ../../admin/category-list.php');

	exit();

} else {

	$name = $_POST['name'];
	$short_desc = $_POST['short_desc'];
	$long_desc = $_POST['long_desc'];

	$sql = "INSERT INTO categories(name,short_desc,long_desc) VALUES(?,?,?)";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$name, $short_desc, $long_desc])) {

    	$_SESSION['msg'] = 'Меню добалено';

		header('location: ../../admin/category-list.php');
    	
    } else {

    	$_SESSION['msg'] = 'Ошибка сервера! Повторите попытку через некоторое время!';

		header('location: ../../admin/category-list.php');

    }


}