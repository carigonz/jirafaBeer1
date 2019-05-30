<?php

require_once "db.php";
require_once "usuario.php";

class DbMysql extends DB 
{
	protected $conection;

	function __construct()
	{

		$config=file_get_contents("config.json");
		$configArr= json_decode($config,true);

		$dbName= $configArr["dbName"];
		$dbPort= $configArr["dbPort"];
		$dbPass= $configArr["dbPass"];
		
	$dsn = "mysql:host=localhost;dbname=$dbName;port=$dbPort";
	$user = "root";
	$pass = $dbPass;

	try {
		$this->conection = new PDO ($dsn, $user, $pass);
		//para que db muestre los errores en php
		$this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (\Exception $e) {
		echo "hubo un error <br>";
		echo $e-getMessage();
		exit;
		}
	}

	public function guardarUsuario(Usuario $user){

		$stmt = $this->conection->prepare("INSERT INTO usuarios VALUES (default, :name, :lastName, :email, :gender, :pass)");

		$stmt->bindValue(":name", $user->getName());
		$stmt->bindValue (":lastName", $user->getLastName());
		$stmt->bindValue(":email", $user->getEmail());
		$stmt->bindValue(":gender", $user->getGender());
		$stmt->bindValue(":pass", $user->getPass());
	
		$stmt->execute();

	}
	public function buscarUsuario($email){

		$stmt=$this->conection->prepare("SELECT * FROM usuarios WHERE email = :email");

		$stmt->bindValue(":email", $email);
		$stmt->execute();

		$consulta = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if ($consulta == false){
			return NULL;
		} else {
			$usuario = new Usuario($consulta);
			return $usuario;
		}
	}

	public function existeElUsuario($email){
		$stmt=$this->buscarUsuario($email);
		return $stmt;
	}


	public function traerUsuarioLogueado(){
		if (isset($_SESSION["email"])){
			return $this->buscarUsuario($_SESSION["email"]);
		}
		return false;// porque retorna false?
	}

}