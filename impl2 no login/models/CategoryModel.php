<?php

class CategoryModel extends Model {
	
	function __construct() {
		parent::__construct();
		//echo "CategoryModel <br>";
	}
	
	function getCategories() {
		
		require 'CategoryEntity.php';
		$categories = [];
		foreach ($this->db->query('select * from categories') as $row) {
			array_push($categories, new CategoryEntity($row['id_category'], $row['title'], $row['description'], $row['image']) );	
		}
		
		return $categories;
	}
}