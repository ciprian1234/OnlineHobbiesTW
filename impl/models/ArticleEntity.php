<?php
class ArticleEntity {
	private $id_article;
	private $id_user;
	private $id_hobby;
	private $likes;
	private $dislikes;
	private $title;
	private $text;
	private $image;
	
	public function __construct($id_article, $id_user, $id_hobby, $likes, $dislikes, $title, $text, $image){
		$this->id_article = $id_article;
		$this->id_user = $id_user;
		$this->id_hobby = $id_hobby;
		$this->likes = $likes;
		$this->dislikes = $dislikes;
		$this->title = $title;
		$this->text = $text;
		$this->image = $image;
	}
	
	//pk
	public function getId_Article(){
		return $this->id_article;
	}
	
	public function getId_user(){
		return $this->id_user;
	}
	
	public function getId_hobby(){
		return $this->id_hobby;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getText(){
		return $this->text;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function getLikes(){
		return $this->likes;
	}
	
	public function getDislikes(){
		return $this->dislikes;
	}
}