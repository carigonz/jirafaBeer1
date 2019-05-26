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
	
	function __construct(Array $datos){

		if (isset($datos["id"])){
			$this->id =$datos["id"];
			$this->pass = $datos["pass"];
		} else {
				$this->id =$datos["id"];
				$this->pass=password_hash($datos["pass"],PASSWORD_DEFAULT);
		}

		$this->nombre =$datos["nombre"];
		$this->email=$datos["email"];
		$this->gender=$datos["gender"];
	}
	
	public function getId(){
		return $this->id;
	}
	public function getNombre(){
		return $this->nombre;
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


	public function setNombre($nombre){
		$this->nombre = $nombre;
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