<?php
class CommentEntity
{
	private $id_comment;
	private $id_article;
	private $id_user;
	private $text;
	//User
	private $username;
	private $email;
	private $image;
	

	public function __construct($id_comment, $id_article, $id_user, $text, $username, $email, $image){
		$this->id_comment = $id_comment;
		$this->id_article = $id_article;
		$this->id_user = $id_user;
		$this->text = $text;
		$this->username = $username;
		$this->email = $email;
		$this->image = $image;
	}

	//user
	public function getUsername()
    {
        return $this->username;
    }
	
	public function getEmail()
    {
        return $this->email;
    }
	
	public function getImage()
    {
        return $this->image;
    }
	//
	
    public function getId_comment()
    {
        return $this->id_comment;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function getId_article()
    {
        return $this->id_article;
    }

    public function getText()
    {
        return $this->text;
    }
}

?>