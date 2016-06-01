<?php

abstract class Controller
{
	protected $view;
	protected $model;

	function __construct(){
		$this->view = new View();
	}
	public abstract function index();
	
	public function loadModel($name){
		$modelName = $name.'Model';
		$path = 'models/'.$modelName.'.php';
		require $path;
		$this->model = new $modelName();
	}
}

?>