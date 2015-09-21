<?php

class Users extends BaseModel {
	public $id, $user_id, $screen_name, $name;
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
				'user_id' => $row['user_id'],
				'screen_name' => $row['screen_name'],
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
				'user_id' => $row['user_id'],
				'name' => $row['name'],
				'screen_name' => $row['screen_name'],
			));

		return $users;
		} 
	return null;
	}
  }

