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
	
	function createCategory() {
		
		$this->db->beginTransaction();
        try {
			//get image from user
			if(!empty($_FILES['image']['name'])){
				$image = 'public/images/';
				$file_name = $_FILES['image']['name'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];
			  
				$image = $image.$file_name;
				move_uploaded_file($file_tmp, __DIR__.'/../public/images/'.$file_name);
		    }
			else
				$image = 'public/images/cpp.png';
		    $description = "Description...";
			$stmt = $this->db->prepare("INSERT into categories(title, description, image) values(:title, :description, :image)");
			if(!$stmt->execute( [':title' => $_POST['title'], ':description' => $description, ':image' => $image] )){
				echo 'Statement for insert category not working!';
			}
            $this->db->commit();
        }
        catch(PDOException $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
	}
	
	function createHobby() {
		
		$this->db->beginTransaction();
        try {
			//get image from user
			if(!empty($_FILES['image']['name'])){
				$image = 'public/images/';
				$file_name = $_FILES['image']['name'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];
			  
				$image = $image.$file_name;
				move_uploaded_file($file_tmp, __DIR__.'/../public/images/'.$file_name);
		    }
			else
				$image = 'public/images/cpp.png';
			$stmt = $this->db->prepare("INSERT into hobbies(id_category, title, description, image) values(:id_category, :title, :description, :image)");
			if(!$stmt->execute( [':id_category' => $_POST['category'] ,':title' => $_POST['title'], ':description' => $_POST['content'], ':image' => $image] )){
				echo 'Statement for insert hobby not working!';
			}
            $this->db->commit();
        }
        catch(PDOException $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
	}
	
}