<?php

class Users extends BaseModel {
	public $id, $name, $password, $requests;
// $user_id, 

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all() {
		$query = DB::connection()->prepare('SELECT * FROM Users');
		$query->execute();
		$rows = $query->fetchAll();
		$users = array();

		foreach($rows as $row) {
			$users[] = new Users(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'requests' => $row['requests'],
			));

		return $users;
		}
	}

	public static function find($id) {
		$query = DB::connection()->prepare('SELECT * FROM Users where id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row) {
			$Tweets = new Users(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'requests' => $row['requests'],
			));

		return $users;
		} 
	return null;
	}
  }