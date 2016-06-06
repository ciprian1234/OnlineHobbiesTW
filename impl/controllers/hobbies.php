<?php
class Hobbies extends Controller {
	
	function __construct(){
		parent::__construct();
	}
	//private $id_category = 1;
	public function index($param){
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/HobbyModel.php';
		$hobModel = new HobbyModel();
		$hobbies = $hobModel->getHobbies($param[0]);
		
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		
		if(!isset($param[1]))
			$articles = $artModel->getArticlesByIdCategory($param[0]);
		else
			$articles = $artModel->getArticlesByIdHobby($param[1]);
		$this->view->render('hobbies/index', $categories, $hobbies, $articles);
	}
}