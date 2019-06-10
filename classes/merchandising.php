<?php

class Merchardising extends Product 
{
	protected $size;


	function __construct(Array $array){

		$datos=[];

		foreach ($array as $key => $value) {
			$datos[$key]=trim($value);
		}

		$this->id=NULL;
		$this->name=$datos["name"];
		$this->description=$datos["description"];
		$this->stock=$datos["stock"];
		$this->price=$datos["price"];
		$this->avatar=$datos["avatar"];
		$this->size=$datos["size"];
		$this->merchandising= true;


	}

}
