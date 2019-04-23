<?php

session_start();

$_SESSION["name"]=$_POST["name"];
var_dump($_SESSION["name"]);


?>