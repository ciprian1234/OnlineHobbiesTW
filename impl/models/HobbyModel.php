<?php

class HobbyModel extends Model {
	
	function __construct() {
		parent::__construct();
		//echo "CategoryModel <br>";
	}
	
	function getHobbies($id_category) {
		
		require 'HobbyEntity.php';
		$hobbies = [];
		$query = "select * from hobbies where id_category='$id_category[0]'";
		foreach ($this->db->query($query) as $row) {
			array_push($hobbies, new HobbyEntity($row['id_hobby'], $row['id_category'], $row['title'], $row['description'], $row['image']) );	
		}
		return $hobbies;
	}
}