<?php
	
	$dbhost = 'localhost';
	$dbname = 'blogs';
	$dbuser = 'root';
	$dbpass = '123456';

	try{
		$db = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo "connection error".$e->getmessage();
	}
?>