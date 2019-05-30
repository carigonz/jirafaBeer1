<?php

class Auth
{
	function __construct(){

		session_start();
		//si hay cookies -> inicio session
		if (isset($_COOKIE["email"])){
			$_SESSION["email"]= $_COOKIE["email"];

			//var_dump($_COOKIE);
			//exit;
		
			//setCookie("name",$usuario->getName(),time()+60*60*24*30);
			//setCookie("email",$usuario->getEmail(),time()+60*60*24*30);
			//setCookie("pass",$usuario->getPass(),time()+60*60*24*30);
		}
	}

	public function loguearUsuario(Usuario $usuario){
		$_SESSION["email"]= $usuario->getEmail();

		//como seteo cookies si no puedo traer a un usuario en la definicion de classe ?
		//$usuario= $dbMysql->buscarUsuario($email);
		
		setCookie("name",$usuario->getName(),time()+60*60*24*30);
		setCookie("email",$usuario->getEmail(),time()+60*60*24*30);
		setCookie("pass",$usuario->getPass(),time()+60*60*24*30);
	}


	public function usuarioLogueado(){
		return isset($_SESSION["email"]);
	}


	//adentro de usuarioLogueado()
	public function setCookies(Usuario $usuario){
		setCookie("name",$usuario->getName(),time()+60*60*24*30);
		setCookie("email",$usuario->getEmail(),time()+60*60*24*30);
		setCookie("pass",$usuario->getPass(),time()+60*60*24*30);
	}



}