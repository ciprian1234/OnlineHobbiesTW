<?php

class Database extends PDO
{
	public function __construct(){
		parent::__construct('mysql:host=fenrir.info.uaic.ro;dbname=ohoTW;port=3306', 'ohoTW', 'TGJ8JQY5PB');
	}
	
	
}