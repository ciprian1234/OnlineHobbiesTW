<?php
class User extends Controller {

    function __construct(){
        parent::__construct();
        //echo 'error controller <br>';
    }
	
	public function myProfile(){
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/UserModel.php';
		$userModel = new UserModel();
		$user=unserialize($_SESSION['user']);
		
		if($user->getRank() > 0) {
			$this->view->render('user/adminProfile', $categories, [], [], []);
		}
		else {
			require_once __DIR__.'/../models/HobbyModel.php';
			$hobModel = new HobbyModel();
			$hobbies = $hobModel->getPreferences();
			$hobbies2 = $hobModel->getAllHobbies();
			$this->view->render('user/userProfile', $categories, $hobbies, $hobbies2, []);
		}
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
	
	//admin only
	
	public function pdfStatistics(){
		require __DIR__.'/../models/rapp.php';
	}
	
	public function createCategory(){
		require __DIR__.'/../models/UserModel.php';
		$userModel = new UserModel();
		$userModel->createCategory();
		header('Location:'.URL.'user/myProfile');
	}
	
	public function createHobby(){
		require __DIR__.'/../models/UserModel.php';
		$userModel = new UserModel();
		$userModel->createHobby();
		header('Location:'.URL.'user/myProfile');
		header('Location:'.URL.'user/myProfile');
	}
}