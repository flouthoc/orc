<?php

/*** registry.php - a global value holder 
		instead of making global vars throughout the framework we'd prefer using 
		a instance holder which'll transfer variables which are supposed to global
		from one instance to other ***/

class registry{

	private $vars = array();

	public function __set($index,$value){

		$this->vars[$index] = $value;
	}

	public function __get($index){
		
		return $this->vars[$index];
	}
}

?>