<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\StudInsertController;
use App\Http\Controllers\CompanyCRUDController;


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

Route::get('/login', function () {
    return view('login');
});

Route::post("/login" , [UserController::class,'login']);
Route::get("/" , [ProductController::class,'index']);
Route::get("detail/{id}" , [ProductController::class,'detail']);


Route::get('student', [StudentController::class,'index']);
Route::get('student/create', [StudentController::class,'create']);
Route::post('student', [StudentController::class,'store']);


//Build a basic laravel website | laravel - Eduonix
Route::get('/home', function (){
    return view('website/home');
});

Route::get('/contact', function (){
    return view('website/contact');
});
Route::get('/about', function (){
    return view('website/about');
});



Route::resource('companies', CompanyCRUDController::class);
// Route::post('companies/index1', [CompanyCRUDController::class,'index1']);


//insert data
// Route::get('student_details/insert','StudInsertController@insert');
// Route::post('student_details','StudInsertController@store');
