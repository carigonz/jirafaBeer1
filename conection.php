<?php

//si van a setear su conexion no me borren esto, comentenlo y agregen las lineas para sus pcs
$dsn = "mysql:host=localhost;dbname=Giraff_Beer;port=3336";
$user = "root";
$pass = "";

try {
	$db = new PDO ($dsn, $user, $pass);
	//para que db muestre los errores en php
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\Exception $e) {
	echo "hubo un error <br>";
	
	echo $e-getMessage();
	exit;
}