<?php

class Product 
{
	protected $id;
	protected $name;
	protected $description;
	protected $stock;
	protected $price;
	protected $avatar;
	protected $merchardising;


	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getdescription(){
		return $this->description;
	}
	public function getStock(){
		return $this->stock;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getAvatar(){
		return $this->avatar;
	}
	public function getMerchand(){
		return $this->merchardising;
	}


	public function setName($nombre){
		$this->name = $nombre;
		return $this;
	}
	public function setdescription($descripcion){
		$this->description = $descripcion;
		return $this;
	}
	public function setStock($cantidad){
		$this->stock = $cantidad;
		return $this;
	}
	public function setPrice($valor){
		$this->price = $valor;
		return $this;
	}
	public function setMerchandising($condicion){
		$this->merchandising = $condicion;
		return $this;
	}
	public function setAvatar($image){
		$this->avatar = $image;
		return $this;
	}
	
}


?>