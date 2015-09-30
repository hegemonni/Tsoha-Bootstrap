<?php

  class HelloWorld extends BaseModel{

    public static function say_hi(){
      return 'Hello World!';
    }

    public static function sandbox(){
  		$doom = new Requests(array(
    	'name' => 'd',
    	'hahstag' => 'eilen',
  		));
  		$errors = $doom->errors();

  		Kint::dump($errors);
	}
  }
