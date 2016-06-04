<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 2:20 PM
 */
class ArticleModel extends Model {

    function __construct() {
        parent::__construct();
        //echo "Home_Model <br>";
    }
	
	function getArticlesByIdHobby($id_hobby) {
		require 'ArticleEntity.php';
		
		$stmt = $this->db->prepare("SELECT * from articles where id_hobby = :id_hob");
		
		$id_hob = intVal($id_hobby);
		if(!$stmt->execute( [':id_hob' => $id_hob] )){
			echo 'Statement not working';
			var_dump($id_hob);
		}
		
		$articles = [];
		while ($row = $stmt->fetch()) {
			array_push($articles, new ArticleEntity($row['id_article'], $row['id_user'], $row['id_hobby'], $row['likes'], $row['dislikes'],
													$row['title'], $row['text'], $row['image']));
		}
		return $articles;
	}
	
	function getArticlesByIdCategory($id_category) {
		require 'ArticleEntity.php';
		
		$stmt = $this->db->prepare("SELECT * from categories c, hobbies h, articles a
		where c.id_category = :id_cat and c.id_category=h.id_category and h.id_hobby = a.id_hobby");
		
		$id_cat = intVal($id_category[0]);
		if(!$stmt->execute( [':id_cat' => $id_cat] )){
			echo 'Statement not working';
			var_dump($id_cat);
		}
		//$count = $stmt->rowCount();
		$articles = [];
		while ($row = $stmt->fetch()) {
			array_push($articles, new ArticleEntity($row['id_article'], $row['id_user'], $row['id_hobby'], $row['likes'], $row['dislikes'],
													$row['title'], $row['text'], $row['image']));
		}
		return $articles;
	}
}