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

/*
 * Route For Docmentation - start
 * */
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
 * Route For Docmentation - end
 * */

/*
 * Route to manage Place details
 * */
$app->post('api/place/create/{token}', 'PlaceController@store');
$app->post('api/place/{id}/update/{token}', 'PlaceController@update');
$app->delete('api/place/{id}/remove/{token}', 'PlaceController@remove');
$app->get('api/place/{token}','PlaceController@findall');
$app->get('api/place/{id}/{token}', 'PlaceController@findid');
$app->get('api/place/name/{name}/{token}', 'PlaceController@findname');
$app->get('api/place/district/{district}/{token}', 'PlaceController@finddistrict');
$app->get('api/place/category/{category}/{token}', 'PlaceController@findcategory');

/*
 * Route to mange review details
 * */
$app->post('api/review/create/{token}', 'PlaceController@storereview');
$app->get('api/review/{placeid}/{token}', 'PlaceController@reviewfindId');
$app->delete('api/review/{reviewid}/{token}', 'PlaceController@reviewdelete');

//$app->get('review/{placeid}', 'PlaceController@showreview');
/*
 * Location Based Service
 * */
$app->get('api/place/location/{latitude}/{longitude}/{count}/{token}', 'PlaceController@findnearlocation');

/*
 * Route to manage guider
 * */
$app->post('api/guider/create/{token}', 'GuiderController@store');
$app->get('api/guider/{token}', 'GuiderController@findall');
$app->delete('api/guider/{id}/{token}', 'GuiderController@remove');
$app->post('api/guider/{id}/update/{token}', 'GuiderController@update');
$app->get('api/guider/name/{name}/{token}', 'GuiderController@findguider');
$app->get('api/guider/category/{category}/{token}', 'GuiderController@findguiderbycategory');

/*
 * Route to manage Hotels
 * */
$app->post('api/hotel/create/{token}', 'HotelController@create');
$app->post('api/hotel/{id}/update/{token}', 'HotelController@update');
$app->get('api/hotel/{token}', 'HotelController@findall');
$app->get('api/hotel/name/{name}/{token}', 'HotelController@findhotel');
$app->get('api/hotel/district/{district}/{token}', 'HotelController@findhoteldistrict');

/*
$app->get('testtoken',function(){
   \App\User::generateToken('ishantuf@gmail.com','123');
});*/

$app->post('user/create','UserController@create');
$app->post('token/create','UserController@tokencheck');
/*$app->get('/hello',function(\Illuminate\Http\Request $request){
   echo $request->getHost();
});*/


