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
	
	public function deletePreference($param){
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/HobbyModel.php';
		$hobModel = new HobbyModel();
		$hobModel->deletePreference($param[0]);
		$hobbies = $hobModel->getPreferences();
		header('Location:'.URL.'user/myProfile');
		//$this->view->render('user/userProfile', $categories, $hobbies, [], []);
	}
	
	public function addPreference($param){
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/HobbyModel.php';
		$hobModel = new HobbyModel();
		$hobModel->addPreference();
		$hobbies = $hobModel->getPreferences();
		header('Location:'.URL.'user/myProfile');
		//$this->view->render('user/userProfile', $categories, $hobbies, [], []);
	}
}