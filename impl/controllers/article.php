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
		$commentModel = new CommentModel();
		$commentList = $commentModel->getCommentList($param[0]);


        $this->view->render('article/index', $categories, $hobbies, $article,$commentList);
    }
}