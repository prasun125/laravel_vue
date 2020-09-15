<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('modify-route/{id}', 'TripController@modifyRoute');
Route::get('create-plan', 'TripController@create')->name('route.create');
Route::post('create-plan', 'TripController@create')->name('route.create');
Route::get('get-cities/{previousCityId?}/{firstAddonCityId?}/{secondAddonCityId?}', 'CityController@getCities');
Route::get('fetch-prev-curr-distance-time/{previousCityId}/{currentCityId}/{firstaddonId?}/{secondaddonId?}', 'AddOnCityController@fetchPrevCurrDistanceTime');
/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => '/admin', 'middleware' => ['authenticate']], function () {
//Route::group(['prefix' => '/admin'], function () {
	Route::get('/dashboard', 'AdminController@dashboard');
	Route::group(['prefix' => '/user'], function () {
		Route::get('/add', 'AdminController@addUserForm');
		Route::post('/add', 'AdminController@saveUser');
		Route::get('/{userId}/edit', 'AdminController@editUserForm');
		Route::post('/{userId}/edit', 'AdminController@updateUser');
	});
	Route::get('/users', 'AdminController@showUsers');
	Route::post('/logout', 'Auth\LoginController@logout');
	Route::group(['prefix' => '/price-rule'], function () {
		Route::get('/add', 'PriceRuleController@addPriceRuleForm');
		Route::post('/add', 'PriceRuleController@savePriceRule');
		Route::get('/{priceRuleId}/edit', 'PriceRuleController@editPriceRuleForm');
		Route::post('/{priceRuleId}/edit', 'PriceRuleController@updatePriceRule');
	});
	Route::get('/price-rules', 'PriceRuleController@showPriceRules');
	Route::group(['prefix' => '/city'], function () {
		Route::get('/add', 'CityController@addCityForm');
		Route::post('/add', 'CityController@saveCity');
		Route::get('/{cityId}/edit', 'CityController@editCityForm');
		Route::post('/{cityId}/edit', 'CityController@updateCity');
	});
	Route::get('/cities', 'CityController@showCities');
	Route::get('/city-distance-time', 'CityDistanceTimeController@showCityDistanceTime');
	Route::get('/add-on-cities', 'AddOnCityController@displayAddOnCities');
	Route::get('/pre-defined-routes', 'RouteController@showPredefinedRoute');
	Route::get('/update-route/{id}/{status}', 'RouteController@updatePredefinedRoute');
	Route::group(['prefix' => '/pre-defined-route'], function () {
		Route::get('/add', 'RouteController@addPredefinedRouteForm');
		Route::post('/add', 'RouteController@savePredefinedRoute');
		/*Route::get('/{routeId}/edit', 'RouteController@editPredefinedRouteForm');
		Route::post('/{routeId}/edit', 'RouteController@updatePredefinedRoute');*/
	});
	Route::get('/user-defined-routes', 'RouteController@showUserdefinedRoute');
	Route::get('/confirm-booking/{id}', 'AdminController@updateBooking');
	Route::group(['prefix' => '/bookings'], function () {
		Route::get('/created', 'AdminController@createdBookings');
		Route::get('/pending', 'AdminController@pendingBookings');
		Route::get('/confirmed', 'AdminController@confirmedBookings');
		Route::get('/completed', 'AdminController@completedBookings');
	});
	Route::get('variables', 'VariableController@showVariables');
	Route::group(['prefix' => 'variable'], function () {
		Route::get('/add', 'VariableController@addVariableForm');
		Route::post('/add', 'VariableController@saveVariable');
		Route::get('/edit/{var_id}', 'VariableController@editVariableForm');
		Route::post('/edit/{var_id}', 'VariableController@updateVariable');
	});
	Route::group(['prefix' => '/vehicle'], function () {
		Route::get('/add', 'VehicleController@create');
		Route::post('/add', 'VehicleController@store');
		Route::get('/{cityId}/edit', 'VehicleController@edit');
		Route::post('/{cityId}/edit', 'VehicleController@update');
	});
	Route::get('/vehicles', 'VehicleController@index');
});

/*
|--------------------------------------------------------------------------
| Cron Routes
|--------------------------------------------------------------------------
*/
Route::get('/get-add-on-cities', 'AddOnCityController@showAddOnCities');

Route::group(['middleware' => ['authentication']], function(){
	Route::get('check-out/{id}', 'RouteController@checkOut');
	Route::post('payment-confirmation/{id}', 'RouteController@paymentConfirm');
});


Route::get('/get_distance_time', 'CityDistanceTimeController@getDistanceTime');
Route::get('fetch-routes', 'TripController@fetchRoute');
Route::post('registration', 'Auth\AuthController@register');
Route::post('login', 'Auth\AuthController@login');

//This section is for managing the route modification
Route::get('all-routes', 'RouteController@index');
Route::post('trip-planner', 'TripController@createPlan');
//Route::get('trip-planner', 'TripController@createPlan');
Route::get('modify-routes', 'TripController@modifyRoutes');
Route::get('modify-route/{id}', 'TripController@modifyRoute');
Route::post('update-route-cities', 'TripController@updateRouteDetails');
Route::post('add-destination', 'TripController@addDestination');
Route::post('delete-places', 'TripController@deletePlaces');

Route::get('create-route', 'RouteController@createRoute');
Route::post('create-route', 'RouteController@storeRoute');

Route::post('save-details', 'TripController@saveDetails');
Route::post('change-date', 'TripController@changeDate');
Route::post('fetch-plans', 'RouteController@fetchPlans');
Route::get('my-plans', 'RouteController@myPlans');
Route::get('check-routes', 'RouteController@checkRoutes');
Route::get('fetch-distance/{currentCityId}/{previousCityId}', 'AddOnCityController@fetchDistanceBetweenCities');
Route::get('fetch-first-addon-city/{previousCityId}/{currentCityId}', 'AddOnCityController@fetchFirstAddonCity');
Route::get('fetch-second-addon-city/{previousCityId}/{currentCityId}/{firstAddonCityId}', 'AddOnCityController@fetchSecondAddonCity');
Route::get('fetch-first-middle-addon-city/{cityId}', 'AddOnCityController@fetchFirstMiddleAddonCity');
Route::get('fetch-second-middle-addon-city/{cityId}/{firstMiddleAddonId}', 'AddOnCityController@fetchSecondMiddleAddonCity');
Route::get('recalculate-addon/{prevAddOnId}/{allAddOns}', 'AddOnCityController@recalculateAddonDistanceTime');
Route::post('display-add-on-cities-popup', 'AddOnCityController@displayAddOnCityDetails');
Route::post('add-user-add-on-city', 'UserAddOnCityController@storeAddOnCity');
Route::post('toggle-airport/{routeId}', 'TripController@toggleAirport');
Route::post('fetch-city', 'CityController@fetchCity');

Route::get('fetch-cities', 'CityController@fetchCities');
Route::get('test', 'UserController@fetchUser');

Route::get('/error', function () {
	return view('access-denied');
});
	
Route::get('/get-cities/{cityName}', 'CityController@getCities');
	
Route::get('/newsletter', 'NewsLetterController@getNewsletter');
Route::post('/newsletter', 'NewsLetterController@saveNewsletter');
	
Route::post('create-route', 'TripController@createRoute');
Route::post('update-route/{routeId}', 'TripController@updateRoute');
Route::get('calculate-distance-price-time/{previousCityId}/{currentCityId}', 'TripController@calculateDistancePriceTime');
