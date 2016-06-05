<?php
class Comment
{
private $data = array();
    private $user_name;
    private $id_comment;
    private $id_article;
    private $article_text;
    private $user_photo;

public function __construct($idart,$idcom,$name,$photo,$text)
{
    $this->user_name = $name;
    $this->id_comment = $idcom;
    $this->id_article = $idart;
    $this->user_photo = $photo;
    $this->article_text = $text;

}
    
    public function getUserPhoto(){
        return $this->user_photo;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->id_comment;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @return mixed
     */
    public function getArticleText()
    {
        return $this->article_text;
    }

}

?>