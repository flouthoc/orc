<?php

/* Class to initiate DB connection and setting up instance of query handler */


class db{

	private $handle;

	function __construct($param, $configHost, $configUser, $configPasswd, $configDB){

		if($param == "mysql"){

			$handle = new mysqli($configHost, $configUser, $configPasswd, $configDB);

		}

	}

}

?>