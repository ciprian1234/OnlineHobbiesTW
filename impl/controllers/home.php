<?php
class Home extends Controller {
	
	function __construct(){
		parent::__construct();
		//echo 'home controller <br>';

	}
	
	public function index(){
		$this->view->render('home/index');
	}
}