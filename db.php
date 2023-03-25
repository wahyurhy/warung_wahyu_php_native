<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'warung_wahyu';

	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal terhubung ke database');
 ?>