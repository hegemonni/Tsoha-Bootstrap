<?php

class TweetController extends BaseController{
  public static function tietokannat(){
    // Haetaan kaikki twiitit tietokannasta
    $tweets = Tweet::all();
    // Renderöidään views kansiossa sijaitseva tiedosto tietokannat.html muuttujan $tweets datalla
    View::make('tietokannat.html', array('tweets' => $tweets));
  }
}