<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 2:20 PM
 */
class UserModel extends Model {

    function __construct() {
        parent::__construct();
        //echo "Home_Model <br>";
    }
	function getArticlesByIdUser($id_user){
		require 'ArticleEntity.php';
		
		$stmt = $this->db->prepare("SELECT * from articles where id_user = :id_user");
		
		$id_usr = intVal($id_user);
		if(!$stmt->execute( [':id_user' => $id_usr] )){
			echo 'Statement not working';
			var_dump($id_usr);
		}
		
		$articles = [];
		while ($row = $stmt->fetch()) {
			array_push($articles, new ArticleEntity($row['id_article'], $row['id_user'], $row['id_hobby'], $row['likes'], $row['dislikes'],
													$row['title'], $row['text'], $row['image']));
		}
		return $articles;
	}
	
	
	}