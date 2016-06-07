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
		
		$result = $this->db->prepare("insert into preferences(id_user, id_hobby) values(:id_user, :id_hobby)");
		
		$user=unserialize($_SESSION['user']);
		$id_user = $user->getId_user();
        if(!$result->execute([':id_user' => $id_user, ':id_hobby' => $_POST['hobby'] ])){
            echo 'Statement addPreference not working';
            var_dump($id_hobby);
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