<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
   
});

// Route::get('/', 'HomeComponent@render');

// Route::get('/shop', 'ShopComponent');

// Route::get('/cart', 'CartComponent');

// Route::get('/checkout', 'CheckoutComponent');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('registration', 'CustomAuthController@registration')->name('register');
Route::post('custom-registration', 'CustomAuthController@custom_registration')->name('register.custom'); //ok resoure

Route::get('/dashboard', 'CustomAuthController@dashboard')->name('dashboard'); //ok resoure
Route::get('logout', 'CustomAuthController@logout')->name('logout'); //ok resoure
Route::get('login', 'CustomAuthController@index')->name('login');

Route::post('custom-login', 'CustomAuthController@custom_login')->name('login.custom'); //ok resoure
Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('/profile/edit_validation', 'ProfileController@edit_validation')->name('profile.edit_validation');

//Login and setup
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('/main/successlogin', 'MainController@successlogin');
Route::get('/main/logout', 'MainController@logout');
Route::get('signup', 'MainController@signup');
Route::post('/main/signup', 'MainController@custom_registration')->name('main.signup'); //ok resoure

//country
Route::get('/country', 'CountryController@index')->name('index');
Route::post('/country/add', 'CountryController@addCountry')->name('country.add');
Route::post('/country/update', 'CountryController@updateCountry')->name('country.update');
Route::get('/country/edit/{id}', 'CountryController@updateForm');
Route::delete('/country/delete/{id}', 'CountryController@deleteCountry');

//states
Route::get('/state', 'StateController@index')->name('state.index');
Route::post('/state/add', 'StateController@addState')->name('state.add');
Route::post('/state/update', 'StateController@updateState')->name('state.update');
Route::get('/state/edit/{id}', 'StateController@updateForm');
Route::delete('/state/delete/{id}', 'StateController@deleteState');


// City
Route::get('/city', 'CityController@index')->name('city.index');
Route::post('/city/add', 'CityController@addCity')->name('city.add');

Route::get('/city/countries', 'CityController@getCountry')->name('countries');
Route::get('/city/states', 'CityController@getStates')->name('states');
Route::get('/city/cities', 'CityController@getCities')->name('cities');

Route::post('/city/update', 'CityController@updateCity')->name('city.update');
Route::get('/city/edit/{city_key}', 'CityController@updateForm');

Route::get('/test', 'test@ganesh');




//fullcalendar
Route::get('/full-calender', 'FullCalenderController@index');
Route::post('/full-calender/action','FullCalenderController@action');

Route::get('/full-calenders', 'FullCalenderController@indexofView')->name('full-calenders');


