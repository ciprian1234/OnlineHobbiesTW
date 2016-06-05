<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/5/2016
 * Time: 12:37 PM
 */
class CommentModel extends Model{

    function __construct() {
        parent::__construct();
        //echo "Home_Model <br>";
    }

    public function getCommentList($id){
        require 'CommentEntity.php';
        $comments = array();
        $result = $this->db->prepare("SELECT id_article,id_comment,user_photo,user_name,text FROM comments WHERE id_article = :id");
        $result->execute([':id' => $id]);
        $idNum = (int)$id;
        if(!$result->execute([':id' => $idNum])){
            echo 'Statement not working';
            var_dump($idNum);
        }

        $comments = [];
        while ($row = $result->fetch()) {
            array_push($comments, new Comment($row['id_article'], $row['user_name'], $row['user_photo'], $row['text']));
        }
        return $comments;
    }

    public function addComment($id_article,$user_photo,$user_name,$text){
        $this->db->beginTransaction();
        try {
            var_dump($id_article);
            $this->db->exec("INSERT INTO comments(id_article,user_name,text,user_photo) VALUES($id_article,'$user_name','$text','$user_photo')");
            var_dump($id_article);
            $this->db->commit();
        }
        catch(PDOException $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
    }

}