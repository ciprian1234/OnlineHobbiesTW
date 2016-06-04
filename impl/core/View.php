<?php

class View {
	
	function __construct(){
		//echo 'main view <br>';
	}
	
	public function render($name, $content=[]) {
		require 'views/' . $name . '.php';
	}
}
?>