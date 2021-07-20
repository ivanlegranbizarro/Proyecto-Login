<?php 

$serverName = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'loginproject';

$connexion = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$connexion) {
	die('Connection failed: ' . mysqli_connect_error());
}