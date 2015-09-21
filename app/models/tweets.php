<?php

class Tweet extends BaseModel {
	public $id, $tweet_id, $tweet_text, $name, $user_id;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all() {
		$query = DB::connection()->prepare('SELECT * FROM Tweets');
		$query->execute();
		$rows = $query->fetchAll();
		$tweets = array();

		foreach($rows as $row) {
			$tweets[] = new Tweet(array(
				'id' => $row['id'],
				'user_id' => $row['user_id'],
				'tweet_id' => $row['tweet_id'],
				'tweet_text' => $row['tweet_text'],
				'name' => $row['name']
			));

		return $tweets;
		}
	}

	public static function find($id) {
		$query = DB::connection()->prepare('SELECT * FROM Tweets where id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row) {
			$tweet = new Tweet(array(
				'id' => $row['id'],
				'user_id' => $row['user_id'],
				'tweet_id' => $row['tweet_id'],
				'tweet_text' => $row['tweet_text'],
				'name' => $row['name']
			));

		return $tweet;
		} 
	return null;
	}
  }

