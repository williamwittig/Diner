<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create instance of the base class
$f3 = Base::instance();

session_start();

// Define a default route
// Home page rendering
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

// Breakfast page rendering
$f3->route('GET /breakfast', function() {
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// Lunch page rendering
$f3->route('GET /lunch', function() {
    $view = new Template();
    echo $view->render('views/lunch.html');
});

// Order page 1 rendering
$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render('views/orderForm1.html');
});

// Order page 2 rendering
$f3->route('POST /order2', function() {
    // Move order form 1 data from POST to SESSION
    var_dump($_POST);
    $_SESSION['food'] = $_POST['food'];
    $_SESSION['meal'] = $_POST['meal'];

    $view = new Template();
    echo $view->render('views/orderForm2.html');
});

// Summary page rendering
$f3->route('POST /summary', function() {
    var_dump($_POST);
    $conds = "None";
    if (!empty($_POST['conds'])) {
        $conds = implode(", ", $_POST['conds']);
    }
    $_SESSION['conds'] = $conds;

    $view = new Template();
    echo $view->render('views/orderSummary.html');
});

// Run fat free
$f3->run();