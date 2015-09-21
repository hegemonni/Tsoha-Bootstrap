<?php

class TweetController extends BaseController{
  public static function tietokannat(){
    // Haetaan kaikki twiitit tietokannasta
    $request = new Request(array(
    	'name' => $params['name'];
    	'alkaen'=> $params['alkaen'];
    	'paattyen' => $paattyen['paattyen'];
    	'hashtagit' => $params['hashtagit'],
    	'kuvaus' => $params['kuvaus'];
    	));
    // Renderöidään views kansiossa sijaitseva tiedosto tietokannat.html muuttujan $tweets datalla
    $request->save();
  }
}