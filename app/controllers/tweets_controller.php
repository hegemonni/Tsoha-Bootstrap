<?php

class TweetController extends BaseController{
  public static function data(){
    // Haetaan kaikki twiitit tietokannasta
    $tweets = Tweet::all();
    // Renderöidään views kansiossa sijaitseva tiedosto tietokannat.html muuttujan $tweets datalla
    View::make('data.html', array('tweets' => $tweets));
  }
}