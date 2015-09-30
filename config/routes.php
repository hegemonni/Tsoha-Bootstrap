<?php

  $routes->get('/', function() {
    	HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    	HelloWorldController::sandbox();
  });

	$routes->get('/etusivu', function() {
  		HelloWorldController::index();
	});

	$routes->get('/tilaus', function() {
  		RequestController::tilaus();
	});

  $routes->get('/tilaukset', function() {
      RequestController::tilaukset();
  });

	$routes->get('/tietokannat', function() {
  		HelloWorldController::tietokannat();
	});

	$routes->get('/esittelysivu', function() {
  		HelloWorldController::esittelysivu();
	});

	$routes->get('/linkkeja', function() {
  		HelloWorldController::linkkeja();
	});

  $routes->get('/login', function() {
      UserController::login();
  });

  $routes->post('/login', function() {
      UserController::handle_login();
  });

  $routes->get('/tilaus/:id/edit', function($id){
      RequestController::edit($id);
  });
  
  $routes->post('/tilaus/:id/edit', function($id){
      RequestController::update($id);
  });

  $routes->post('/tilaus/:id/destroy', function($id){
      RequestController::destroy($id);
  });

  $routes->get('/tietokannat', function(){
      TweetController::tietokannat();
  });

  // Tilauksen lisääminen tietokantaan
  $routes->post('/scraper', function(){
      RequestController::store();
  });

  // Tilauslomakkeen näyttäminen
  $routes->get('/tilaus', function(){
      RequestController::create();
  });

  $routes->get('/tilaus/:id', function($id){
      RequestController::show($id);
  });

  