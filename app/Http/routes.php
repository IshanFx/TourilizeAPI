<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
   return view('document');
});
$app->get('/doc/place', function () use ($app) {
   return view('place');
});
$app->get('/doc/hotel', function () use ($app) {
   return view('hotel');
});
$app->get('/doc/guider', function () use ($app) {
   return view('guider');
});
$app->get('/doc/placereview', function () use ($app) {
   return view('review');
});

$app->get('/doc/errordoc', function () use ($app) {
   return view('errorpage');
});
$app->get('/doc/requestresponse', function () use ($app) {
   return view('requestresponse');
});
$app->get('/doc/user', function () use ($app) {
   return view('register');
});
$app->get('/doc/step', function () use ($app) {
   return view('step');
});


/*
 * Route to manage Place details
 * */
$app->post('place/create', 'PlaceController@store');
$app->post('place/{id}/update', 'PlaceController@update');
$app->delete('place/{id}/remove', 'PlaceController@remove');
$app->get('place/findall','PlaceController@findall');
$app->get('place/{id}', 'PlaceController@findid');
$app->get('place/name/{name}', 'PlaceController@findname');
$app->get('place/district/{district}', 'PlaceController@finddistrict');
$app->get('place/category/{category}', 'PlaceController@findcategory');

/*
 * Route to mange review details
 * */
$app->post('review/create', 'PlaceController@storereview');
$app->get('review/{placeid}', 'PlaceController@reviewfindId');

//$app->get('review/{placeid}', 'PlaceController@showreview');
/*
 * Location Based Service
 * */
$app->get('place/location/{latitude}/{longitude}/{count}', 'PlaceController@findnearlocation');

/*
 * Route to manage guider
 * */
$app->post('guider/create', 'GuiderController@store');
$app->get('guider/findall', 'GuiderController@findall');
$app->delete('guider/{id}', 'GuiderController@remove');
$app->post('guider/{id}/update', 'GuiderController@update');
$app->get('guider/name/{name}', 'GuiderController@findguider');
$app->get('guider/category/{category}', 'GuiderController@findguiderbycategory');

/*
 * Route to manage Hotels
 * */
$app->post('hotel/create', 'HotelController@create');
$app->post('hotel/{id}/update', 'HotelController@update');
$app->get('hotel/findall', 'HotelController@findall');
$app->get('hotel/name/{name}/{token}', 'HotelController@findhotel');
$app->get('hotel/district/{district}', 'HotelController@findhoteldistrict');


$app->get('testtoken',function(){
   \App\User::generateToken('ishantuf@gmail.com','123');
});

$app->post('user/create','UserController@create');
$app->post('token/create','UserController@tokencheck');



