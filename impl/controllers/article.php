<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 2:09 PM
 */

class Article extends Controller {

    function __construct(){
        parent::__construct();
        //echo 'error controller <br>';
    }

    public function index($param){
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/HobbyModel.php';
		$hobModel = new HobbyModel();
		$hobbies = $hobModel->getHobbies($param[0]);
		
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		
		$article = $artModel->getArticleById($param[0]);

		require __DIR__.'/../models/CommentModel.php';
		$comModel = new CommentModel();
		$comments = $comModel->getComments($param[0]);

		
        $this->view->render('article/index', $categories, $hobbies, $article, $comments);
    }
	public function shareArticle($param){
		require __DIR__. '/../hybridauth/Hybrid/Auth.php';
		require __DIR__. '/config.php';

		//Facebook share
		if($_SESSION['provider'] == "Facebook") {
			$hybridauth = new Hybrid_Auth($config);
			$facebook = $hybridauth->authenticate("Facebook");

			$facebook->api()->api("/me/feed", "post", array(
				"message" => "I posted a new article.Check it out.",
				"link" => URL . "article/" . $param[0],
				"name" => $param[1],
				"caption" => "Caption"
			));
		}

		header("Location:" . $_SERVER["HTTP_REFERER"]);
	}
	
	public function submitComment($param) {
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		$article = $artModel->getArticleById($param[0]);
		
		
		require __DIR__.'/../models/CommentModel.php';
		$comModel = new CommentModel();
		$comModel->insertComment($param[0], $_POST['content']);
		$comments = $comModel->getComments($param[0]);
		
		$this->view->render('article/index', $categories, [], $article, $comments);
	}
}