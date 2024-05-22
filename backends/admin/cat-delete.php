<?php

session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'Ошибки сервера! Повторите попытку через некоторое время!';

	header('location: ../../admin/category-list.php');

	exit();
	
}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Неправильный ID!';

	header('location: ../../admin/category-list.php');

	exit();
} 

	$id = $_REQUEST['id'];


	$sql = "DELETE FROM categories WHERE id = ?";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$id])) {

    	$_SESSION['msg'] = 'Меню удалено!';

		header('location: ../../admin/category-list.php');
    	
    } else {

    	$_SESSION['msg'] = 'Ошибки сервера! Повторите попытку через некоторое время!';

		header('location: ../../admin/category-list.php');

    }

