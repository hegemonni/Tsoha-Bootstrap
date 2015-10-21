<?php
	
	class Json extends BaseModel{
		public $id, $name, $json_data, $description;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}