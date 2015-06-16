<?php

include __SITE_PATH.'/config/'.'config.php';
include __SITE_PATH.'/application/'.'controllerBase.class.php';
include __SITE_PATH.'/application/'.'registry.class.php';
include __SITE_PATH.'/application/'.'router.class.php';
include __SITE_PATH.'/application/'.'template.class.php';
include __SITE_PATH.'/application/'.'db.class.php';

function __autoload($classname){
	$filename = strtolower($classname).'.class.php';
	$file = __SITE_PATH.'/model/'.$filename;

	if(file_exists($file) == false){
		return false;
	}
	include($file);
}

$registry = new registry;
//$registry->db = db::getInstance();


?>