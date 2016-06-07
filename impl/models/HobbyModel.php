<?php

class HobbyModel extends Model {
	
	function __construct() {
		parent::__construct();
		//echo "CategoryModel <br>";
	}
	
	function getPreferences() {

		$result = $this->db->prepare("SELECT * FROM preferences natural join hobbies WHERE id_user = :id_user");
		
		$user=unserialize($_SESSION['user']);
		$id_user = $user->getId_user();
        if(!$result->execute([':id_user' => $id_user])){
            echo 'Statement getPreferences not working';
            var_dump($id_user);
        }
		
		require 'HobbyEntity.php';
        $hobbies = [];
        while ($row = $result->fetch()) {
            array_push($hobbies, new HobbyEntity($row['id_hobby'], $row['id_category'], $row['title'], $row['description'], $row['image']) );
        };
        return $hobbies;
		
	}
	
	function deletePreference($id_hobby) {
		
		$result = $this->db->prepare("delete from preferences WHERE id_user = :id_user and id_hobby = :id_hobby");
		
		$user=unserialize($_SESSION['user']);
		$id_user = $user->getId_user();
        if(!$result->execute([':id_user' => $id_user, ':id_hobby' => $id_hobby])){
            echo 'Statement deletePreference not working';
            var_dump($id_hobby);
        }
	}
	
	function addPreference() {
		//check if preference already exist
		$result = $this->db->prepare("insert into preferences(id_user, id_hobby, motiv) values(:id_user, :id_hobby, :motiv)");
		$user=unserialize($_SESSION['user']);
		$id_user = $user->getId_user();
        if(!$result->execute([':id_user' => $id_user, ':id_hobby' => $_POST['hobby'], ':motiv' => $_POST['motiv'] ])){
            echo 'Statement addPreference not working';
            var_dump($id_hobby);
        }
		
		if(isset($_POST['shareToFacebok'])){
			require __DIR__. '/../hybridauth/Hybrid/Auth.php';
			require __DIR__. '/../controllers/config.php';

			//Facebook share
			if($_SESSION['provider'] == "Facebook") {
				$hybridauth = new Hybrid_Auth($config);
				$facebook = $hybridauth->authenticate("Facebook");
				
				//select id_category
				$result = $this->db->prepare("SELECT id_category FROM hobbies WHERE id_hobby = :id_hobby");
				if(!$result->execute([':id_hobby' => $_POST['hobby'] ])){
					echo 'Statement select id category not working';
				}
				else {
					$row = $result->fetch();
					$facebook->api()->api("/me/feed", "post", array(
					"message" => $_POST['motiv'],
					"link" => URL . "hobbies/".$row['id_category']."/" . $_POST['hobby']
					//"name" => $param[1],
					//"caption" => "Caption"
					));
				}
			}
				
			
			
		}
	}
	
	function getHobbies($id_category) {
		
		require_once 'HobbyEntity.php';
		$hobbies = [];
		$query = "select * from hobbies where id_category='$id_category'";
		foreach ($this->db->query($query) as $row) {
			array_push($hobbies, new HobbyEntity($row['id_hobby'], $row['id_category'], $row['title'], $row['description'], $row['image']) );	
		}
		return $hobbies;
	}
	
	function getAllHobbies() {
		require_once 'HobbyEntity.php';
		$hobbies = [];
		$query = "select * from hobbies";
		foreach ($this->db->query($query) as $row) {
			array_push($hobbies, new HobbyEntity($row['id_hobby'], $row['id_category'], $row['title'], $row['description'], $row['image']) );	
		}
		return $hobbies;
	}
}