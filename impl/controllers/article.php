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
	
	public function likeArticle($param){
		
		
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		$article = $artModel->likeArticle($param[0]);
		header('Location:'.URL.'article/index/'.$param[0]);
	}
	
	public function dislikeArticle($param){
		
		
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		$article = $artModel->dislikeArticle($param[0]);
		header('Location:'.URL.'article/index/'.$param[0]);
	}
	
	public function deleteArticle($param){
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		$article = $artModel->deleteArticle($param[0]);
		header('Location:'.URL.'user/myArticles');
	}
	
	
	public function searchArticles() {
		
		require __DIR__.'/../models/CategoryModel.php';
		$catModel = new CategoryModel();
		$categories = $catModel->getCategories();
		
		require __DIR__.'/../models/ArticleModel.php';
		$artModel = new ArticleModel();
		$articles = $artModel->searchArticles();
		$this->view->render('article/searchArticles', $categories, [], $articles, []);
	}
	
	public function shareArticle($param){
		require __DIR__. '/../hybridauth/Hybrid/Auth.php';
		require __DIR__. '/config.php';

		//Facebook share
		if($_SESSION['provider'] == "Facebook") {
			
			require __DIR__.'/../models/ArticleModel.php';
			$artModel = new ArticleModel();
			$article = $artModel->getArticleById($param[0]);
			
			$hybridauth = new Hybrid_Auth($config);
			$facebook = $hybridauth->authenticate("Facebook");
			$facebook->api()->api("/me/feed", "post", array(
				"message" => "I posted a new article.Check it out.",
				"link" => URL . "article/" . $param[0],
				"name" => $article->getTitle(),
				"caption" => "Caption"
			));
		}

		header("Location:" . $_SERVER["HTTP_REFERER"]);
	}
}