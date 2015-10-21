<?php
	
	class Request extends BaseModel{
		public $id, $name, $start_date, $end_date, $description, $hashtags;

		public function __construct($attributes) {
			parent::__construct($attributes);
			// $this->validators = array('validate_string_lenght', 'validate_string_date', 'validate_string_hashtag');
		}

		public static function all() {
			$query = DB::connection()->prepare('SELECT * FROM Requests');
			$query->execute();
			$rows = $query->fetchAll();
			$requests = array();

			foreach($rows as $row) {
				$requests[] = new Request(array(
				'id' => $row['id'],
				'name' => $row['name'],
				// 'start_date' => $row['start_date'],
				// 'end_date' => $row['end_date'],
				'description' => $row['description'],
				'hashtags' => $row['hashtags']
			));

			return $requests;
			}
		}

		public static function find($id) {
			$query = DB::connection()->prepare('SELECT * FROM Requests where id = :id LIMIT 1');
			$query->execute(array('id' => $id));
			$row = $query->fetch();

			if($row) {
				$request = new Request(array(
					'id' => $row['id'],
					'name' => $row['name'],
					// 'start_date' => $row['start_date'],
					// 'end_date' => $row['end_date'],
					'description' => $row['description'],
					'hashtags' => $row['hashtags']
				));

				return $request;
			} 

			return null;
		}

		public static function scrape($id) {
			$query_1 = DB::connection()->prepare('SELECT * FROM Requests where id = :id LIMIT 1');
			$query_1->execute(array('id' => $id));
			$row = $query_1->fetch();

			$name = $row['name'];
    		$description = $row['description'];
			$hashtag = $row['hashtags'];
			$json = file_get_contents('https://pytwrest.herokuapp.com/tweets/' .$hashtag);


			$query_2 = DB::connection()->prepare('INSERT INTO Json (name, json_file, description) VALUES (:name, :json_file, :description)');
    		$query_2->execute(array('name' => $name, 'json_file' => $json, 'description' => $description));
		}

		public function save(){
			// Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
			$query = DB::connection()->prepare('INSERT INTO Requests (name, description, hashtags) VALUES (:name, :description, :hashtags) RETURNING id');
    		// Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    		$query->execute(array('name' => $this->name, 'description' => $this->description, 'hashtags' => $this->hashtags));
    		// Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    		$row = $query->fetch();
    		// Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    		
  		// 	Kint::trace();
 			// Kint::dump($row);
    		$this->id = $row['id'];
  		}


		public function update(){
			$query = DB::connection()->prepare('UPDATE Requests (name, description, hashtags) VALUES (:name, :start_date, :end_date, :description, :hashtags) RETURNING id');
    		$query->execute(array('name' => $this->name, 'description' => $this->description, 'hashtags' => $this->hashtags));
    		$row = $query->fetch();

    		Kint::trace();
 			Kint::dump($row);
    		$this->id = $row['id'];
  		}

  		public function delete(){
			$query = DB::connection()->prepare('DELETE Requests (name, description, hashtags) VALUES (:name, :start_date, :end_date, :description, :hashtags) RETURNING id');
    		$query->execute(array('name' => $this->name, 'description' => $this->description, 'hashtags' => $this->hashtags));
    		$row = $query->fetch();
    		$this->id = $row['id'];
  		}
	}