<?php

  $routes->get('/', function() {
    	HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    	HelloWorldController::sandbox();
  });

	$routes->get('/index', function() {
  		HelloWorldController::index();
	});

	$routes->get('/request', function() {
  		RequestController::request();
	});

  $routes->get('/userrequests', function() {
      RequestController::userrequests();
  });

	$routes->get('/data', function() {
  		HelloWorldController::data();
	});

	$routes->get('/about', function() {
  		HelloWorldController::about();
	});

	$routes->get('/links', function() {
  		HelloWorldController::links();
	});

  $routes->get('/login', function() {
      UserController::login();
  });

  $routes->post('/login', function() {
      UserController::handle_login();
  });

  $routes->get('/request/:id/edit', function($id){
      RequestController::edit($id);
  });
  
  $routes->post('/request/:id/edit', function($id){
      RequestController::update($id);
  });

  $routes->post('/request/:id/destroy', function($id){
      RequestController::destroy($id);
  });

  $routes->get('/data', function(){
      TweetController::data();
  });

  // Tilauksen lisääminen tietokantaan
  $routes->post('/scraper', function(){
      RequestController::store();
      RequestControler::scrape();
  });

  // Tilauslomakkeen näyttäminen
  $routes->get('/request', function(){
      RequestController::create();
  });

  $routes->get('/request/:id', function($id){
      RequestController::show($id);
  });

  