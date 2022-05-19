<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the necessary files
require_once('vendor/autoload.php');
require_once('model/validation.php');

//Start a session
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

// Create an instance of the controller class
$con = new Controller($f3);

//Define a default route
$f3->route('GET /', function() {
    global $con;
    $con->home();
});

//Define a breakfast route
$f3->route('GET /breakfast', function() {
    global $con;
    $con->breakfast();
});

//Define a lunch route
$f3->route('GET /lunch', function() {
    global $con;
    $con->lunch();
});

//Define an order route
$f3->route('GET|POST /order', function() {
    global $con;
    $con->order();
});

//Define an order2 route
$f3->route('GET|POST /order2', function() {
    global $con;
    $con->order2();
});

//Define a summary route -> orderSummary.html
$f3->route('GET|POST /summary', function() {
    global $con;
    $con->summary();
});

//Run fat-free
$f3->run();