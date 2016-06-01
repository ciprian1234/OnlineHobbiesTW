<?php

class View {
	
	function __construct(){
		//echo 'main view <br>';
	}
	
	public function render($name)
	{
		//echo 'main view <br>';
		require 'views/' . $name . '.php';
	}
}