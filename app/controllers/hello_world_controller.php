<?php

// require 'app/models/tweets.php';
class HelloWorldController extends BaseController{
  // ...

public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
       //View::make('home.html');
      View::make('etusivu.html');
    }

public static function sandbox(){
      // View::make('helloworld.html');
      // $tweet_id = Tweet::find(0);
      // $tweets = Tweet::all();
      // Kint::dump($tweets);
      // Kint::dump($tweet_id);

      // $doom = new Request(array(
      // 'name' => 'd',
      // 'hahstag' => 'eilen',
      // ));
      // $errors = $doom->errors();

      // Kint::dump($errors);

      $query = DB::connection()->prepare('SELECT * FROM Users WHERE name = :name AND password = :password LIMIT 1', array('name' => $name, 'password' => $password));
      $query->execute();
      $row = $query->fetch();
      if($row){
      // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
      }else{
      // Käyttäjää ei löytynyt, palautetaan null
      }
  }

  // public static function tilaus(){
  //   View::make('tilaus.html');
  // }

  public static function tietokannat(){
    View::make('tietokannat.html');
  }

    public static function tilaukset(){
    View::make('tilaukset.html');
  }

  public static function esittelysivu(){
    View::make('esittelysivu.html');
  }

  public static function linkkeja(){
    View::make('linkkeja.html');
  }
}

  // class HelloWorldController extends BaseController{


  //   }
  // }


