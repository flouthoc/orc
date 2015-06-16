<?php

abstract class baseController{

	protected $registry;

	public $model;

	function __construct($registry){

		$this->registry = $registry;
	}

	function setModel($model){
		
		$this->model = $model;
	}

	abstract function index();
}

?>