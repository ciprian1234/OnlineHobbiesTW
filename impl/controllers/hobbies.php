<?php
class Hobbies extends Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index($id_category){
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		//de adaugat articles model
		require __DIR__.'/../models/HobbyModel.php';
		$hobModel = new HobbyModel();
		$hobbies = $hobModel->getHobbies($id_category);
		
		$this->view->render('hobbies/index', $categories, $hobbies, []);
	}
}