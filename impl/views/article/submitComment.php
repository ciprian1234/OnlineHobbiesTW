<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/5/2016
 * Time: 2:46 PM
 */
// Error reporting:
require_once '../models/CommentModel.php';


/*
/	This array is going to be populated with either
/	the data that was sent to the script, or the
/	error messages.
/*/
if(isset($_POST['text'])) {
    $commentText = $_POST['text'];
    $commentUser = $_POST['name'];
    $commentPhoto = $_POST['photo'];
    $commentArticleId = $_POST['id_article'];
}

/* Everything is OK, insert to database: */
$commentModel = new CommentModel();
$commentModel->addComment($commentArticleId, $commentPhoto, $commentUser, $commentText);
/*
    /	The data in $arr is escaped for the mysql query,
    /	but we need the unescaped variables, so we apply,
    /	stripslashes to all the elements in the array:
    /*/
//  $insertedComment2 = new Comment(10,"Valoare","Valoare mare","Sunt valoros");
//$insertedComment = new Comment($arr['id_article'],$arr['name'],$arr['photo'],$arr['text']);

header("Location:" . $_SERVER["HTTP_REFERER"]);
?>