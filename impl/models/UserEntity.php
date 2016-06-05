<?php
class UserEntity {
	private $id_user;
	private $email;
	private $username;
	private $image;
	private $id;
	private $rank;
	
	
	public function __construct($id_user, $email, $username, $image, $id, $rank){
		$this->id_user = $id_user;
		$this->email = $email;
		$this->username = $username;
		$this->image = $image;
		$this->id = $id;
		$this->rank = $rank;
	}
	
	
	public function getId_user(){
		return $this->id_user;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getRank(){
		return $this->rank;
	}
	
}