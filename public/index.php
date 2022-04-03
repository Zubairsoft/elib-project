<?php
require_once __DIR__ . '/../vendor/autoload.php';

use coding\app\controllers\AuthorController;
use coding\app\controllers\PublisherController;
use coding\app\controllers\BookController;
use coding\app\controllers\CategoryController;
use coding\app\controllers\OfferController;
use coding\app\controllers\CityController;
use coding\app\controllers\PaymentController;
use coding\app\controllers\UserAddressController;
use coding\app\system\AppSystem;
use coding\app\system\Router;
use coding\app\controllers\UsersController;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));//createImmutable(__DIR__);
$dotenv->load();

$config=array(
  'servername'=>$_ENV['DB_SERVER_NAME'],
  'dbname'=>$_ENV['DB_NAME'],
  'dbpass'=>$_ENV['DB_PASSWORD'],
  'username'=>$_ENV['DB_USERNAME']

);
$system=new AppSystem($config);


// User Route

Router::get('/remove_user{id}',[UsersController::class,'delete']);

Router::get('/users',[UsersController::class,'listAll']);
Router::get('/new_user',[UsersController::class,'newUser']);
Router::get('/edit_user{id}',[UsersController::class,'edit']);
Router::post('/save_user',[UsersController::class,'saveUser']);
Router::post('/update_user',[UsersController::class,'update']);
//author Route
Router::get('/new_author',[AuthorController::class,'show']);
Router::post('/save_author',[AuthorController::class,'AddAuthor']);
Router::get('/remove_author',[AuthorController::class,'delete']);
Router::get('edit_author{id}',[AuthorController::class,'edit']);
Router::post('update_author',[AuthorController::class,'update']);

Router::get('/new_publisher',[PublisherController::class,'show']);
Router::post('/save_publisher',[PublisherController::class,'AddPublisher']);
Router::get('/remove_publisher',[PublisherController::class,'delete']);
Router::get('/edit_publisher{id}',[PublisherController::class,'delete']);
Router::post('/update_publisher',[PublisherController::class,'delete']);

// book route 

Router::get('/new_book',[BookController::class,'show']);
Router::post('/save_book',[BookController::class,'AddBook']);
Router::get('/remove_book',[BookController::class,'delete']);
Router::get('/edit_book{id}',[BookController::class,'edit']);
Router::get('/list_book',[BookController::class,'listAll']);
Router::post('/update_book',[BookController::class,'update']);



// category route
Router::get('/new_category',[CategoryController::class,'create']);
Router::post('/save_category',[CategoryController::class,'AddCategory']);
Router::get('/list_category',[CategoryController::class,'listAll']);
Router::get('/remove_category',[CategoryController::class,'delete']);
Router::post('/edit_category{id}',[CategoryController::class,'edit']);

//Offer route
Router::get('/new_offer',[OfferController::class,'create']);
Router::post('/save_offer',[OfferController::class,'AddOffer']);
Router::get('/list_offer',[OfferController::class,'listAll']);
Router::get('/remove_offer',[OfferController::class,'delete']);
Router::post('/update_offer',[OfferController::class,'update']);
Router::get('/edit_offer{id}',[OfferController::class,'edit']);


// city route
Router::get('/new_city',[CityController::class,'create']);
Router::post('/save_city',[CityController::class,'AddCity']);
Router::post('/update_city',[CityController::class,'update']);
Router::get('/list_city',[CityController::class,'listAll']);
Router::get('/edit_city{id}',[CityController::class,'edit']);
Router::get('/remove_city',[CityController::class,'delete']);

// payment route
Router::get('/new_payment',[PaymentController::class,'create']);
Router::post('/save_payment',[PaymentController::class,'AddPayment']);
Router::get('/list_Payment',[PaymentController::class,'listAll']);
Router::get('/edit_payment{id}',[PaymentController::class,'edit']);
Router::post('/update_payment',[PaymentController::class,'update']);
Router::post('/remove_payment',[PaymentController::class,'update']);

// user address route  //coding Doing 
Router::get('/new_address',[UserAddressController::class,'create']);
Router::post('/save_address',[UserAddressController::class,'AddPayment']);
Router::get('/list_address',[UserAddressController::class,'listAll']);
// Router::get('/edit_address',[UserAddressController::class,'update']);

Router::post('/update_address',[UserAddressController::class,'update']);
Router::get('/remove_address',[UserAddressController::class,'delete']);

$system->start();


