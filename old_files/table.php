<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pw = 'root';
$link = mysql_connect($db_host, $db_user, $db_pw);
if (!$link) {
	die('Verbindung fehlgeschlagen:' . mysql_error());
}
/*
$create_db = 'CREATE DATABASE IF NOT EXISTS mealshare_db';
$db_query = mysql_query($create_db, $link);
if ($db_query) {
	echo "toll";
} else {
	echo  mysql_error();
}
$create_table = 'CREATE TABLE IF NOT EXISTS mealshare_db.user_tbl (
	user_ID int AUTO_INCREMENT PRIMARY KEY,
	firstname varchar(255),
	lastname varchar(255),
	email varchar(255),
	street varchar(255),
	city varchar(255),
	password varchar(255)
)';
$create_table_2 = 'CREATE TABLE IF NOT EXISTS mealshare_db.meal_tbl (
	user_ID int,
	meal_ID int AUTO_INCREMENT PRIMARY KEY,
	title varchar(255),
	description varchar(255),
	date varchar(255),
	hour varchar(255),
	seats int
)';

$table_query = mysql_query($create_table, $link);
if ($table_query) {
	echo "toll2";
} else {
	echo mysql_error();
}*/


?>
