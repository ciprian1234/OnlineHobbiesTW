<?php

class View {
	
	function __construct(){
		//echo 'main view <br>';
	}
	
	public function render($name, $categories, $hobbies=[], $articles=[], $comments=[], $statistics=[]) {
		require 'views/' . $name . '.php';
	}
}
?>