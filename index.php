<?php

	/**Enable error reporting**/
	error_reporting(E_ALL);

	/**defining site path constants**/
	$site_path = getcwd();
	define('__SITE_PATH',$site_path);

	/*** include init.php file ***/
	include 'includes/init.php';

	/*load router */

	$registry->db = new db("mysql", $configHost, $configUser, $configPasswd, $configDB);
	/*** set the path to the controllers directory ***/
	$registry->router = new router($registry);
	$registry->router->setPath (__SITE_PATH . '/controller');

	$registry->template = new template($registry);	
	$registry->router->loader();

?>