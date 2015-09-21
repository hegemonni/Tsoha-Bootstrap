<?php

class RequestController extends BaseController{
  
  public static function tilaus(){
    // Haetaan kaikki tilaukset tietokannasta
    $requests = Request::all();
    // Renderöidään tiedosto tilaus.html muuttujan $games datalla
    View::make('tilaus.html', array('requests' => $requests));
	}

  public static function store(){
    $params = $_POST;
    $request = new Request(array(
    	'name' => $params['name'],
    	'alkaen'=> $params['alkaen'],
    	'paattyen' => $paattyen['paattyen'],
    	'hashtagit' => $params['hashtagit'],
    	'kuvaus' => $params['kuvaus']
    ));

    Kint::dump($params);
    
    $request->save();

    // Redirect::to('/tilaus/' . $request->id, array('message' => 'Tilaus onnistui ja on nyt käsittelyssä.'));
  }
}