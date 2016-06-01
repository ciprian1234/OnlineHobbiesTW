<?php

class LoginModel extends Model {
	
	function __construct() {
		parent::__construct();
		//echo "Login_Model <br>";
	}
	
	public function auth() {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmt = $this->db->prepare("SELECT * FROM users 
		WHERE username = :user AND password= :pass ");
	$stmt->execute([':user' => $$username, ':pass' => $password]);
	
	$data = $stmt->fetchAll();
	print_r($data);
	echo 'asd';
	}
}