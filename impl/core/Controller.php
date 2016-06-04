<?php

abstract class Controller
{
	protected $view;
	
	function __construct(){
		$this->view = new View();
	}
	
	/*public function loadModel($name){
		$modelName = $name.'Model';
		$path = 'models/'.$modelName.'.php';
		require $path;
		$this->model = new $modelName();
	}*/
}

?>