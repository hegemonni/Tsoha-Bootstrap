<?php

class RequestController extends BaseController{
  
    public static function tilaukset(){
    // Haetaan kaikki tilaukset tietokannasta
    $requests = Request::all();
    // Renderöidään tiedosto tilaukset.html muuttujan $requests datalla
    View::make('tilaukset.html', array('requests' => $requests));
  }

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

  public static function edit($id) {
    $request = Request::find($id);
    View::make('tilaus/edit.html', array('attributes' => $request));
  }

  public static function update() {
    $params = $_POST;

    $attributes = array(
      'name' => $params['name'],
      'start_date'=> $params['start_date'],
      'end_date' => $params['end_date'],
      'hashtags' => $params['hashtags'],
      'description' => $params['description']
    );

    $request = new Request($attributes);
    $errors = $request->errors();

    if (count($errors) > 0){
      View::make('tilaus/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $request->update();
      Redirect::to('/tilaus/' . $request->id, array('message' => 'The request has been succesfully edited'));
    }
  }
  
  public static function destroy($id){
    $request = new Request(array('id' => $id));
    $request->destroy();
    Redirect::to('/tilaus', array('message' => 'The request has been succesfully deleted'));
  }
}