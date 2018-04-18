<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'password;
$db = 'db';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
