<?php 

/** Responsible for initialisng views and template variables in the runtime. **/ 

class template{

	private $registry;


	private $vars = array();

	function __construct($registry){

		$this->registry = $registry;
	}

	public function __set($index,$value){

		$this->vars[$index] = $value;
	}


	public function show($name){

		$path = __SITE_PATH.'/views'.'/'.$name.'.php';

		if(file_exists($path) == false){

			throw new Exception('Template not found '.$path);
			return false;
		}

		//loading vars for template needs
		foreach($this->vars as $key => $value){
			$$key = $value;
		}

		include($path);
	}



}

?>