<?php
/* Database connection settings */
$host = '127.0.0.1:49207';
$user = 'azure';
$pass = '******';
$db = 'terveysremontti';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
