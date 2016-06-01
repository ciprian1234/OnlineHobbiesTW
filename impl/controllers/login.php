<?php
class Login extends Controller {
	
	function __construct(){
		parent::__construct();
		//echo 'login controller <br>';
	}
	
	public function index(){
		$this->view->render('login/index');
	}
}