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
$app->post('tour', 'TourController@store');
$app->post('tour/{id}/update', 'TourController@update');
$app->post('tour/{id}/review', 'TourController@storereview');
$app->get('tour/{id}/review', 'TourController@showreview');

$app->delete('tour', 'TourController@remove');
$app->get('tour/findall', 'TourController@findall');
$app->get('tour/{id}', 'TourController@findid');
$app->get('tour/search/name/{name}', 'TourController@findname');
$app->get('tour/search/district/{district}', 'TourController@finddistrict');
$app->get('tour/search/category/{category}', 'TourController@findcategory');

/*
 * Route to manage guider
 * */
$app->post('guider/create', 'GuiderController@store');
$app->delete('guider/{id}', 'GuiderController@remove');
$app->post('guider/{id}/update', 'GuiderController@update');
$app->get('guider/search/name/{name}', 'GuiderController@findguider');
$app->get('guider/search/category/{category}', 'GuiderController@findguidercategory');

/*
 * Route to manage Hotels
 * */
$app->post('hotel/create', 'HotelController@store');
$app->delete('hotel/{id}', 'HotelController@remove');
$app->post('hotel/{id}/update', 'HotelController@update');
$app->get('hotel/search/name/{name}', 'HotelController@findhotel');
$app->get('hotel/search/district/{district}', 'HotelController@findhoteldistrict');




