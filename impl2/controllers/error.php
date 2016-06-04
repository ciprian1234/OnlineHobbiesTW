<?php
class Error extends Controller {
	
	function __construct(){
		parent::__construct();
		//echo 'error controller <br>';
	}
	
	public function index(){
		$this->view->render('error/index');
	}
}