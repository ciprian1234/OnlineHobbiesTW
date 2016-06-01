<?php

class App
{
	private $controller = 'home';
	private $method = 'index';
	private $params = [];
	
	public function __construct() {
		$url = $this->parseUrl();
		
		if( file_exists('../impl/controllers/' .$url[0] . '.php') ) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once '../impl/controllers/' . $this->controller . '.php';
		$modelPrefix = $this->controller;
		$this->controller = new $this->controller;
		$this->controller->loadModel($modelPrefix);
		
		if(isset($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		$this->params = $url ? array_values($url) : [];
		call_user_func([$this->controller, $this->method], $this->params);
	}
	
	public function parseUrl()
	{
		if( isset($_GET['url']) ){
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}

?>