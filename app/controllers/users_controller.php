<?php

class UsersController extends BaseController{
  public static function index(){
    // Haetaan kaikki käyttäjät tietokannasta
    $users = Users::all();
    // Renderöidään views kansiossa sijaitseva tiedosto tietokannat.html muuttujan $users datalla
    View::make('/tietokannat.html', array('users' => $users));
  }

  public static function login(){
  	View::make('user/login.html')
  }

  public static function handle_login(){
  	$params=$_POST;

  	$user=User::authenticate($params['username'], $params['password']);

  	if (!user) {
  		View::make('user/login.html', array('error' => 'Wrong username or password', 'username' => $params['username']));
  	}else{
  		$_SESSION['user'] = $user->id;

  		Redirect::to('/', array('message' => 'Welcome back ' . $user->name . '!'));
  	}
  }
}