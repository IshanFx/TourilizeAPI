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
    return $app->version();
});
/*
 * Route to manage Tour Location details
 * */
$app->post('place', 'PlaceController@store');
$app->post('place/{id}/update', 'PlaceController@update');
$app->post('place/review', 'PlaceController@storereview');
$app->get('place/{id}/review', 'PlaceController@showreview');

$app->delete('place', 'PlaceController@remove');
$app->get('place/findall', 'PlaceController@findall');
$app->get('place/{id}', 'PlaceController@findid');
$app->get('place/name/{name}', 'PlaceController@findname');
$app->get('place/district/{district}', 'PlaceController@finddistrict');
$app->get('place/category/{category}', 'PlaceController@findcategory');

/*
 * Location Based Service
 * */
$app->get('place/location/{latitude}/{longitude}/{count}', 'PlaceController@findnearlocation');


/*
 * Route to manage guider
 * */
$app->post('guider/create', 'GuiderController@store');
$app->delete('guider/{id}', 'GuiderController@remove');
$app->post('guider/{id}/update', 'GuiderController@update');
$app->get('guider/name/{name}', 'GuiderController@findguider');
$app->get('guider/category/{category}', 'GuiderController@findguiderbycategory');

/*
 * Route to manage Hotels
 * */
$app->post('hotel/create', 'HotelController@store');
$app->delete('hotel/{id}', 'HotelController@remove');
$app->post('hotel/{id}/update', 'HotelController@update');
$app->get('hotel/findall', 'HotelController@findall');
$app->get('hotel/name/{name}', 'HotelController@findhotel');
$app->get('hotel/district/{district}', 'HotelController@findhoteldistrict');




