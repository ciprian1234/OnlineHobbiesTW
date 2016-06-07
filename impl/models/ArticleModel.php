<?php

/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 2:20 PM
 */
class ArticleModel extends Model
{

    function __construct()
    {
        parent::__construct();
        //echo "Home_Model <br>";
    }


    function submitArticle()
    {
        require 'ArticleEntity.php';

        $this->db->beginTransaction();
        try {
            $user = unserialize($_SESSION['user']);
            $id_user = $user->getId_user();


            //get image from user
            if (!empty($_FILES['image']['name'])) {
                $image = 'public/images/';
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

                $image = $image . $file_name;
                move_uploaded_file($file_tmp, __DIR__ . '/../public/images/' . $file_name);
            } else
                $image = 'public/images/cpp.png';
            $stmt = $this->db->prepare("INSERT into articles(id_user, id_hobby, title, text, image) values(:id_user, :id_hobby, :title, :text, :image)");
            if (!$stmt->execute([':id_user' => $id_user, ':id_hobby' => $_POST['hobby'], ':title' => $_POST['title'], ':text' => $_POST['content'], ':image' => $image])) {
                echo 'Statement for insert article not working!';
            }

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
        }
    }

    function getArticleById($id_article)
    {
        require 'ArticleEntity.php';

        $stmt = $this->db->prepare("SELECT * from articles where id_article = :id_art");
        $id_art = intVal($id_article);
        if (!$stmt->execute([':id_art' => $id_art])) {
            echo 'Statement not working';
            var_dump($id_art);
        }

        $row = $stmt->fetch();
        $article = new ArticleEntity($row['id_article'], $row['id_user'], $row['id_hobby'], $row['likes'], $row['dislikes'],
            $row['title'], $row['text'], $row['image']);
        return $article;
    }

    function getArticlesByIdUser($id_user)
    {
        require 'ArticleEntity.php';

        $stmt = $this->db->prepare("SELECT * from articles where id_user = :id_usr");

        $id_usr = intVal($id_user);
        if (!$stmt->execute([':id_usr' => $id_usr])) {
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


    function getArticlesByIdHobby($id_hobby)
    {
        require 'ArticleEntity.php';

        $stmt = $this->db->prepare("SELECT * from articles where id_hobby = :id_hob");

        $id_hob = intVal($id_hobby);
        if (!$stmt->execute([':id_hob' => $id_hob])) {
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


    function getArticlesByIdCategory($id_category)
    {
        require 'ArticleEntity.php';

        $stmt = $this->db->prepare("SELECT * from categories c, hobbies h, articles a
		where c.id_category = :id_cat and c.id_category=h.id_category and h.id_hobby = a.id_hobby");

        $id_cat = intVal($id_category);
        if (!$stmt->execute([':id_cat' => $id_cat])) {
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
	
	/*public function likeArticle($id_article, $like = 1){
		
		$user = unserialize($_SESSION['user']);
		$id_user = $user->getId_user();
		
		$stmt = $this->db->prepare("SELECT * from likes where id_user = :id_user and id_hobby = :id_hobby");
		if (!$stmt->execute([':id_user' => $id_user, ':id_article' => $id_article])) {
            echo 'Statement not working';
            var_dump($id_cat);
        }
		$row = $stmt->fetch();
		$var_dump($row);
		if($row == false)
			echo 'norows';
		else
			echo 'found';
	}*/
	
	
	public function likeArticle($id_article){
		
		$stmt = $this->db->prepare('UPDATE articles set likes = likes + 1 where id_article = :id_article');
		if (!$stmt->execute([':id_article' => $id_article])) {
            echo 'Statement for like not working';
            var_dump($id_article);
        }
	}
	
	public function dislikeArticle($id_article){
		
		$stmt = $this->db->prepare('UPDATE articles set dislikes = dislikes + 1 where id_article = :id_article');
		if (!$stmt->execute([':id_article' => $id_article])) {
            echo 'Statement for like not working';
            var_dump($id_article);
        }
	}
	
	public function deleteArticle($id_article){
		
		$stmt = $this->db->prepare('DELETE from articles where id_article = :id_article');
		if (!$stmt->execute([':id_article' => $id_article])) {
            echo 'Statement for delete article not working';
            var_dump($id_article);
        }
	}
	
	public function searchArticles(){
		
		
		$stmt = $this->db->prepare("SELECT * from categories c join hobbies h on c.id_category = h.id_category join articles a on h.id_hobby = a.id_hobby
									WHERE c.title like :query1 or h.title like :query2 or a.title like :query3");
		$query = '%'.$_POST['searchQuery'].'%';
		if (!$stmt->execute([':query1' => $query, ':query2' => $query, ':query3' => $query])) {
            echo 'Statement for search not working';
            var_dump($id_usr);
        }

        $articles = [];
		require 'ArticleEntity.php';
        while ($row = $stmt->fetch()) {
            array_push($articles, new ArticleEntity($row['id_article'], $row['id_user'], $row['id_hobby'], $row['likes'], $row['dislikes'],
                $row['title'], $row['text'], $row['image']));
        }
        return $articles;
	}
}