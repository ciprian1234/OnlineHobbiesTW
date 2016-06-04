<?php
class Home extends Controller {
	
	function __construct(){
		parent::__construct();
		//echo 'home controller <br>';
	}
	
	public function index(){
		
		
		require __DIR__.'/../models/CategoryModel.php';
		$this->model = new CategoryModel();
		$categories = $this->model->getCategories();
		
		$this->view->render('home/index', $categories);
	}
}