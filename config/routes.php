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
  		HelloWorldController::tilaus();
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
