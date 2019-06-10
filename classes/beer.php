<?php

class Beer extends Product 
{
	protected $style;
	protected $presentation;


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
		$this->style=$datos["style"];
		$this->presentation=$datos["presentation"];
		$this->merchandising= false;


	}
}
