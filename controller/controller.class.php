<?php

Abstract class baseController{

	protected $registry;

	function __construct($registry){

		$this->registry = $registry;
	}

	Abstract function index();
}

?>