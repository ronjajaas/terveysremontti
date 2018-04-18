<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'Laurea2018';
$db = 'terveysremontti';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
