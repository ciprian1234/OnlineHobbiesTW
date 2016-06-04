<?php
class CategoryEntity {
	private $id_category;
	private $title;
	private $description;
	private $image;
	
	public function __construct($id, $title, $description, $image){
		$this->id_category = $id;
		$this->title = $title;
		$this->description = $description;
		$this->image = $image;
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