<?php

class RequestController extends BaseController{
  
    public static function userrequests(){
    // Haetaan kaikki tilaukset tietokannasta
    $requests = Request::all();
    // Renderöidään tiedosto tilaukset.html muuttujan $requests datalla
    View::make('userrequests.html', array('requests' => $requests));
  }

  public static function request(){
    // Haetaan kaikki tilaukset tietokannasta
    $requests = Request::all();
    // Renderöidään tiedosto tilaus.html muuttujan $requests datalla
    View::make('request.html', array('requests' => $requests));
	}

  public static function store(){
    $params = $_POST;
    $request = new Request(array(
    	'name' => $params['name'],
    	// 'start_date'=> $params['start_date'],
    	// 'end_date' => $params['end_date'],
    	'hashtags' => $params['hashtags'],
    	'description' => $params['description']
    ));

    // Kint::dump($params);
    
    // $id = $request->id;
    $request->save();
    $request->scrape($request->id);

    Redirect::to('/request/' . $request->id, array('message' => 'Tilaus onnistui ja on nyt käsittelyssä.'));
  }

  public static function show($id){
    $request = Request::find($id);
    View::make('request.html');

  }

  public static function edit($id) {
    $request = Request::find($id);
    View::make('request/edit.html', array('attributes' => $request));
  }

  public static function update() {
    $params = $_POST;

    $attributes = array(
      'name' => $params['name'],
      // 'start_date'=> $params['start_date'],
      // 'end_date' => $params['end_date'],
      'hashtags' => $params['hashtags'],
      'description' => $params['description']
    );

    $request = new Request($attributes);
    $errors = $request->errors();

    if (count($errors) > 0){
      View::make('request/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $request->update();
      Redirect::to('/request/' . $request->id, array('message' => 'The request has been succesfully edited'));
    }
  }
  
  public static function destroy($id){
    $request = new Request(array('id' => $id));
    $request->destroy();
    Redirect::to('/request', array('message' => 'The request has been succesfully deleted'));
  }
}