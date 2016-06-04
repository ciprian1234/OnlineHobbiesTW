<?php

class LoginModel extends Model {
	
	function __construct() {
		parent::__construct();
		//echo "Login_Model <br>";
	}
	
	public function auth() {
	
	$stmt = $this->db->prepare("SELECT id_user FROM users 
		WHERE username = :user AND password= :pass");
	$stmt->execute([':user' => $_POST['username'], ':pass' => $_POST['password']]);
	$count = $stmt->rowCount();
	if($count > 0)
		return true;
	else
		return false;
	
	}
}