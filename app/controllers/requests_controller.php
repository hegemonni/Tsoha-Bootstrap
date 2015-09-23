<?php

class RequestController extends BaseController{
  
  public static function tilaus(){
    // Haetaan kaikki tilaukset tietokannasta
    $requests = Request::all();
    // Renderöidään tiedosto tilaus.html muuttujan $requests datalla
    View::make('tilaus.html', array('requests' => $requests));
	}

  public static function store(){
    $params = $_POST;
    $request = new Request(array(
    	'name' => $params['name'],
    	'start_date'=> $params['start_date'],
    	'end_date' => $params['end_date'],
    	'hashtags' => $params['hashtags'],
    	'description' => $params['description']
    ));

    // Kint::dump($params);
    
    $id = $request->id;
    $request->save();
    $request->scrape($id);

    Redirect::to('/tilaus/' . $request->id, array('message' => 'Tilaus onnistui ja on nyt käsittelyssä.'));
  }

  public static function show($id){
    $request = Request::find($id);
    View::make('tilaus.html');

  }
}