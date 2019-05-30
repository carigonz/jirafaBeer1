<?php

class Auth
{
	function __construct(){

		session_start();
		//si hay cookies -> inicio session
		if (isset($_COOKIE["email"])){
			$_SESSION["email"]= $email;
			setCookie("name",$usuario["name"],time()+60*60*24*30);
			setCookie("email",$usuario["email"],time()+60*60*24*30);
			setCookie("pass",$usuario["pass"],time()+60*60*24*30);
		}
	}

	public function loguearUsuario($email){
		$_SESSION["email"]= $email;

		//como seteo cookies si no puedo traer a un usuario en la definicion de classe ?
		//$usuario= $dbMysql->buscarUsuario($email);
		
		setCookie("name",$usuario["name"],time()+60*60*24*30);
		setCookie("email",$usuario["email"],time()+60*60*24*30);
		setCookie("pass",$usuario["pass"],time()+60*60*24*30);
	}


	public function usuarioLogueado(){
		return isset($_SESSION["email"]);
	}


	//adentro de usuarioLogueado()
	public function setCookies(Usuario $usuario){
		setCookie("name",$usuario["name"],time()+60*60*24*30);
		setCookie("email",$usuario["email"],time()+60*60*24*30);
		setCookie("pass",$usuario["pass"],time()+60*60*24*30);
	}



}