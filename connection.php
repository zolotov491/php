<meta charset="utf-8">
<?php

$connection = mysqli_connect('127.0.0.1', 'root', '', 'tabs_bd');

if( $connection == false )
{
	echo "Не удалось подключится к БД!";
	echo mysqli_connect_error();
	exit();
}

?>