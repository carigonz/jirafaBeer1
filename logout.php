<?php

//require_once ("ini.php");
session_start();
session_destroy();


setCookie("name","",-1);
setCookie("email","",-1);
setCookie("pass","",-1);

header("Location:index.php");
//var_dump($_SESSION);
exit;
