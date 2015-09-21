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

	$routes->get('/tietokannat', function() {
  		HelloWorldController::tietokannat();
	});

	$routes->get('/esittelysivu', function() {
  		HelloWorldController::esittelysivu();
	});

	$routes->get('/linkkeja', function() {
  		HelloWorldController::linkkeja();
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


  