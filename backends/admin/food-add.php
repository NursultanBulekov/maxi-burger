<?php


session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'Ошибка сервера! Повторите попытку через некоторое время!';

	header('location: ../../admin/food-list.php');

	exit();
	
}

if (!isset($_POST['name']) || !isset($_POST['desc'])) {

	$_SESSION['msg'] = 'Недопустимые переменные! Обновите страницу и повторите попытку!';

	header('location: ../../admin/food-list.php');

	exit();
}

$regex = '/^[(A-Z)?(a-z)?(А-Я)?(а-я)?(0-9)?\-?\_?\.?\,?\s*]+$/u';


if (!preg_match($regex, $_POST['name']) || !preg_match($regex, $_POST['desc'])) {

	$_SESSION['msg'] = 'Некорректные данные!';

	header('location: ../../admin/food-list.php');

	exit();

} else {

	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$category = $_POST['category'];
	$cost = $_POST['cost'];

	$sql = "INSERT INTO food(cat_id,fname,description,fcost) VALUES(?,?,?,?)";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$category, $name, $desc, $cost])) {

    	$_SESSION['msg'] = 'Блюдо добавлено!';

		header('location: ../../admin/food-list.php');
    	
    } else {

    	$_SESSION['msg'] = 'Ошибка сервера! Повторите попытку через некоторое время!';

		header('location: ../../admin/food-list.php');

    }


}