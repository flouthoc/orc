<?php

class router{

	private $registry;

	private $path;

	private $args = array();

	public $file;

	public $controller;

    public $model;

	public $action;

    public $fileName;

    public $argumentarray = array();

    public $argumentbuffer = array();

	function __construct($registry){

		$this->registry = $registry;
	}


	 function setPath($path) {

        /*** check if path i sa directory ***/
        if (is_dir($path) == false)
        {
                throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        /*** set the path ***/
        $this->path = $path;
	}

	 public function loader(){
        /*** check the route ***/
        $this->getController();

        /*** if the file is not there diaf ***/
        if (is_readable($this->file) == false)
        {
                echo $this->file;
                die ('404 Not Found');
        }

        /*** include the controller ***/
        include $this->file;
        include __SITE_PATH.'/model/'.$this->fileName;

        /*** a new controller class instance ***/
        /** add MODEL associated to that controller **/

        $modelclass = $this->controller .'Model';
        $class = $this->controller .'Controller';

        /*** create Model Instance **/


        $model = new $modelclass($this->registry);
        $controller = new $class($this->registry,$model);
        $controller->setModel($model);

        /*** check if the action is callable ***/
        if (is_callable(array($controller, $this->action)) == false)
        {
                $action = 'index';
        }
        else
        {
                $action = $this->action;
        }

        /*** Check if there is some arguments for action ***/
        /*** run the action ***/

        $controller->$action($this->argumentarray);
 	}

 	

 	private function getController() {

        /*** get the route from the url ***/
        $route = (empty($_GET['rt'])) ? '' : $_GET['rt'];

        if (empty($route))
        {
                $route = 'index';
        }
        else
        {
                /*** get the parts of the route ***/
                $parts = explode('/', $route);
                $this->controller = $parts[0];
                if(isset( $parts[1]))
                {
                        $this->action = $parts[1];
                }

                /* Setting array offset to pass arguments to action or controller */
                $i = 2;
                /* init new array counter */
                $j = 0;

                while($i < count($parts)){

                    $this->argumentarray[$j] = $parts[$i];
                    //increase array counter
                    $i++;
                    $j++;

                }
        }

        if (empty($this->controller))
        {
                $this->controller = 'index';
        }
             /*** Get action ***/
        if (empty($this->action))
        {
                $this->action = 'index';
        }

        /*** set the file path ***/
        $this->file = $this->path .'/'. $this->controller . 'Controller.class.php';
        $this->fileName = $this->controller.'Model.class.php';
	}


}

?>