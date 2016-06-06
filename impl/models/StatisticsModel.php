<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/5/2016
 * Time: 12:37 PM
 */
class StatisticsModel extends Model{

    function __construct() {
        parent::__construct();
    }

    public function getComments($id_article){
        require 'CommentEntity.php';
        $result = $this->db->prepare("SELECT * FROM comments natural join users WHERE id_article = :id order by time desc");
		
        $id_art = (int)$id_article;
        if(!$result->execute([':id' => $id_art])){
            echo 'Statement not working';
            var_dump($id_article);
        }
        $comments = [];
        while ($row = $result->fetch()) {
            array_push($comments, new CommentEntity($row['id_comment'], $row['id_article'], $row['id_user'], $row['text'], 
													$row['username'], $row['email'], $row['picture']));
        };
        return $comments;
    }
	
	public function insertComment($id_article, $text){
		
		$this->db->beginTransaction();
        try {
			$user = unserialize($_SESSION['user']);
			$id_user = $user->getId_user();
            $this->db->exec("INSERT INTO comments(id_article, id_user, text) VALUES('$id_article','$id_user','$text')");
            $this->db->commit();
        }
        catch(PDOException $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
	}

}