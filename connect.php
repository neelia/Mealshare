<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pw = 'root';
$db_name = 'mealshare_db';
//Connecting to database
$connect = mysql_connect($db_host, $db_user, $db_pw);
if(!$connect){
    die("connect1" . mysql_error());
}
//Selecting database
$select_db = mysql_select_db($db_name, $connect);
if(!$select_db){
    die("connect2" . mysql_error());
}
?>