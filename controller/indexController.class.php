<?php

Class indexController Extends baseController {

	public function index() {
		/*** set a template variable ***/
        $this->registry->template->welcome = $this->model->welcome;
		/*** load the index template ***/
        $this->registry->template->show('index');
	}


	/* A test function to check weather we can recieve arguments via url or not */


	public function poop($array){


		var_dump($array);

	}

}

?>