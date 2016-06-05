<?php

class View {
	
	function __construct(){
		//echo 'main view <br>';
	}
	
	public function render($name, $categories, $hobbies=[], $articles=[], $commentsList=[]) {
		require 'views/' . $name . '.php';
	}
}
?>