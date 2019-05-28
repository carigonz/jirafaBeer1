<?php

class Usuario {

	protected $id;
	protected $name;
	protected $lastName;
	protected $email;
	protected $gender;
	protected $pass;

	/* "id"=>lastId(),
    "name"=>trim($array["name"]),
    "lastName"=>trim($array["lastName"]),
    "email"=>trim($array["email"]),
    "gender"=>$array["gender"],
    "pass"=>password_hash($array["pass"],PASSWORD_DEFAULT) */
	
	function __construct(Array $array){

		$datos=[];

		foreach ($array as $position => $valor){
			$datos[$position]=trim($valor);

		}
		//var_dump($datos);
		//exit;

		if (isset($datos["idUsuarios"])){
			$this->id =$datos["idUsuarios"];
			$this->pass = $datos["pass"];
		} else {
				$this->id = NULL;
				$this->pass = password_hash($datos["pass"],PASSWORD_DEFAULT);
		}

		$this->name =$datos["name"];
		$this->lastName = $datos["lastName"];
		$this->email=$datos["email"];
		$this->gender=$datos["gender"];
	}
	
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getLastName(){
		return $this->lastName;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getGender(){
		return $this->gender;
	}
	public function getPass(){
		return $this->pass;
	}


	public function setName($nombre){
		$this->name = $nombre;
		return $this;
	}
	public function setLastName($apellido){
		$this->lastName = $apellido;
		return $this;
	}
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}
	public function setGender($gender){
		$this->gender = $gender;
		return $this;
	}
	//hay que crear el set pass hasheada como funcion privada
	public function setPass($pass){
		$this->pass = $pass;
		return $this;
	}

}