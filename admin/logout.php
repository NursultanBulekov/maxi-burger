<?php


session_start();

session_destroy();

session_start();

$_SESSION['msg'] = 'Вы вышли из системы!';

header('location: index.php');