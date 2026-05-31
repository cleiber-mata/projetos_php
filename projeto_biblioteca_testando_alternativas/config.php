<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("BASE", "biblioteca_alternativo");

	$conn = new MySQLi(HOST,USER,PASS,BASE);

	// if(!$conn){
	// 	die("Erro: ".mysqli_connect_error());
	// }else{
	// 	print "Conectou";	
	// }