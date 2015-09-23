<?php
	
	class Request extends BaseModel{
		public $id, $name, $start_date, $end_date, $description, $hashtags;

		public function __construct($attributes) {
			parent::__construct($attributes);
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
				'start_date' => $row['start_date'],
				'end_date' => $row['end_date'],
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
					'start_date' => $row['start_date'],
					'end_date' => $row['end_date'],
					'description' => $row['description'],
					'hashtags' => $row['hashtags']
				));

				return $request;
			} 

			return null;
		}

		public static function scrape($id) {
			$query = DB::connection()->prepare('SELECT hashtags FROM Requests where id = :id LIMIT 1');
			$query->execute(array('id' => $id));
			$row = $query->fetch();

			if($row) {
				$hashtags = $row['hashtags'];
			}

			$scrape = exec("python twitter-api.py" . $hashtags);
		}

		public function save(){
			// Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
			$query = DB::connection()->prepare('INSERT INTO Requests (name, start_date, end_date, description, hashtags) VALUES (:name, :start_date, :end_date, :description, :hashtags) RETURNING id');
    		// Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    		$query->execute(array('name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date, 'description' => $this->description, 'hashtags' => $this->hashtags));
    		// Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    		$row = $query->fetch();
    		// Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    		
  		// 	Kint::trace();
 			// Kint::dump($row);
    		$this->id = $row['id'];
  		}
	}