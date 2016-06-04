<?php
class Login extends Controller {
	
	function __construct(){
		parent::__construct();
		require __DIR__.'/../models/LoginModel.php';
		$this->model = new LoginModel();
	}
	
	public function index(){
		$this->view->render('login/index');
	}
	
	public function auth(){
		
		
		if ($this->model->auth())
			$this->view->render('home/index');
		else
			$this->view->render('error/index');
	}
}