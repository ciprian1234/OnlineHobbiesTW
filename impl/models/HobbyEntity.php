<?php
class HobbyEntity {
	private $id_hobby;
	private $id_category;
	private $title;
	private $description;
	private $image;
	
	public function __construct($id_hobby, $id_category, $title, $description, $image){
		$this->id_hobby = $id_hobby;
		$this->id_category = $id_category;
		$this->title = $title;
		$this->description = $description;
		$this->image = $image;
	}
	
	
	public function getId_hobby(){
		return $this->id_hobby;
	}
	
	public function getId_category(){
		return $this->id_category;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function getImage(){
		return $this->image;
	}
}