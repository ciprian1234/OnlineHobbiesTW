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
	
	
	function submitArticle() {
		require 'ArticleEntity.php';
		
		$this->db->beginTransaction();
        try {
			$user = unserialize($_SESSION['user']);
			$id_user = $user->getId_user();
			
			
			//get image from user
			$image = 'public/images/';
			if(isset($_FILES['image'])){
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];
				$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
			  
				$expensions= array("jpeg","jpg","png");
			  
				if(in_array($file_ext, $expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
			  
				if($file_size > 10097152){
					$errors[]='File size must be excately 10 MB';
				}
				
				var_dump($errors);
				if(empty($errors)==true){
					$image .= $file_name;
					
					move_uploaded_file($file_tmp, URL.'/public/images/'.$file_name);
				}else{
					print_r($errors);
				}
		   }
			$stmt = $this->db->prepare("INSERT into articles(id_user, id_hobby, title, text, image) values(:id_user, :id_hobby, :title, :text, :image)");
			if(!$stmt->execute( [':id_user' => $id_user, ':id_hobby' => $_POST['hobby'], ':title' => $_POST['title'], ':text' => $_POST['content'], ':image' => $image] )){
				echo 'Statement for insert article not working!';
			}
            $this->db->commit();
        }
        catch(PDOException $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
	}
	
	function getArticleById($id_article) {
		require 'ArticleEntity.php';
		
		$stmt = $this->db->prepare("SELECT * from articles where id_article = :id_art");
		$id_art = intVal($id_article);
		if(!$stmt->execute( [':id_art' => $id_art] )){
			echo 'Statement not working';
			var_dump($id_art);
		}
		
		$row = $stmt->fetch();
		$article = new ArticleEntity($row['id_article'], $row['id_user'], $row['id_hobby'], $row['likes'], $row['dislikes'],
													$row['title'], $row['text'], $row['image']);
		return $article;
	}
	
	function getArticlesByIdUser($id_user) {
		require 'ArticleEntity.php';
		
		$stmt = $this->db->prepare("SELECT * from articles where id_user = :id_usr");
		
		$id_usr = intVal($id_user);
		if(!$stmt->execute( [':id_usr' => $id_usr] )){
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