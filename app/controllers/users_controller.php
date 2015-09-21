<?php

class UsersController extends BaseController{
  public static function index(){
    // Haetaan kaikki käyttäjät tietokannasta
    $users = Users::all();
    // Renderöidään views kansiossa sijaitseva tiedosto tietokannat.html muuttujan $users datalla
    View::make('game/tietokannat.html', array('users' => $users));
  }
}