<?php
$server = 'v.je';
$schema = 'cars';
$username = 'student';
$password = 'student';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
	[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
