<?php

/

abstract class baseController{

	protected $registry;

	public $model;

	function __construct($registry){

		$this->registry = $registry;
	}

	/* Sets the model attribute to this current instance */

	function setModel($model){
		
		$this->model = $model;
	}

	abstract function index();
}

?>