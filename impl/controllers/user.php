<?php
class User extends Controller {

    function __construct(){
        parent::__construct();
        //echo 'error controller <br>';
    }

    public function myArticles(){
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		//require __DIR__.'/../models/HobbyModel.php';
		//$hobModel = new HobbyModel();
		//$hobbies = $hobModel->getHobbies($param[0]);
		
		require __DIR__.'/../models/UserModel.php';
		//require __DIR__.'/../models/UserModel.php';
		$userModel = new UserModel();
		$user=unserialize($_SESSION['user']);
		$articles = $userModel->getArticlesByIdUser($user->getId_user());

		require __DIR__.'/../models/CommentModel.php';
		$commentModel = new CommentModel();
		$comments = $commentModel->getComments($user->getId_user());


        $this->view->render('user/MyArticles', $categories, [], $articles, $comments);
    }
	
	public function createArticle(){
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/HobbyModel.php';
		$hobModel = new HobbyModel();
		$hobbies = $hobModel->getAllHobbies();
		
		require __DIR__.'/../models/UserModel.php';
		$userModel = new UserModel();
		$user=unserialize($_SESSION['user']);

        $this->view->render('user/createArticle', $categories, $hobbies, [], []);
    }
	
	public function submitArticle(){
		require __DIR__.'/../models/ArticleModel.php';
		$articleModel = new ArticleModel();
		$articleModel->submitArticle();
		header('Location:'.URL.'user/myArticles');
        //$this->view->render('user/createArticle', $categories, $hobbies, [], []);
    }
}