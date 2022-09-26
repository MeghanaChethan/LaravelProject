<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
Auth::routes();

// Role-based authentication
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/manager', 'ManagerController@index')->name('manager')->middleware('manager');
Route::get('/user', 'UserController@index')->name('user')->middleware('user');

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');
// Route::get('index', [ProductController::class, 'index'])->name('index');

Route::get('/post/{product}', 'ProductController@show1');


// crud operation Surfside Media
Route::get('/add-post', 'PostController@addPost');
Route::post('/add-post', 'PostController@createPost')->name('post.add');
Route::get('/posts', 'PostController@getPosts');
Route::get('/delete-post/{id}', 'PostController@deletePost');
Route::get('/update-post', 'PostController@updatePost')->name('post.update');
Route::get('/edit-post/{id}', 'PostController@updateForm');

Route::get('/add-user', 'UserController@insertRecord');
Route::get('/get-phone', 'UserController@fethPhoneByUser');

//excel
Route::get('/add-employee', 'EmployeeController@addEmployee');
Route::get('/export-excel','EmployeeController@exportIntoExcel');
Route::get('/export-csv','EmployeeController@exportIntoCSV');

//pdf
Route::get('/get-all-employee', 'EmployeeController@getAllEmployee');
Route::get('/download-pdf', 'EmployeeController@downloadPDF');

// import
Route::get('/import-form', 'EmployeeController@importForm');
Route::post('/import', 'EmployeeController@import')->name('import');

//image
Route::get('/resize-image', 'ImageController@resizeImage');
Route::post('/resize-image', 'ImageController@resizeImageSubmit')->name('imageResize');

//dropzone
Route::get('/dropzone', 'DropzonController@dropzone');
Route::post('/dropzone', 'DropzonController@dropzoneStore')->name('dropzone.store');

// lazyload images
Route::get('/gallery', 'GalleryController@gallery');

//tinyMCE editor
Route::get('/editor', 'EditorController@editor');

//crud Images
Route::get('/add-teacher', 'TeacherController@addTeacher')->name('teacher.add');
Route::post('/add-teacher', 'TeacherController@storeTeacher')->name('teacher.store');
Route::get('/teachers', 'TeacherController@teachers');
Route::get('/edit-teacher/{id}', 'TeacherController@editTeacher');
Route::post('/update-teacher', 'TeacherController@updateTeacher')->name('teacher.update');
Route::get('/delete-teacher/{id}', 'TeacherController@deleteTeacher');

//session
Route::get('/session/get', 'SessionController@getSessionData')->name('session.get');
Route::get('/session/set', 'SessionController@storeSessionData')->name('session.store');
Route::get('/session/remove', 'SessionController@deleteSessionData')->name('session.delete');

//crud postsnews
Route::group(['prefix'=>'postsnews'],function(){
    Route::get('/posts', 'PostsnewController@getAllPost')->name('posts.getallpost');
    Route::get('/add-post', 'PostsnewController@addPost')->name('post.add');
    Route::post('/add-post', 'PostsnewController@addPostSubmit')->name('post.addsubmit');
    Route::get('/posts/{id}', 'PostsnewController@getPostById')->name('post.getbyid');
    Route::get('/delete-post/{id}', 'PostsnewController@deletePost')->name('post.delete');
    Route::get('/edit-post/{id}', 'PostsnewController@editPost')->name('post.edit');
    Route::get('/update-post', 'PostsnewController@updatePost')->name('post.update');

});

//high charts
Route::get('/chart', 'ChartController@index');
Route::get('/bar-chart', 'ChartController@barChart');


// Dynamic dependent dropdown using ajax
Route::get('/dynamic_dependent','DynamicDependent@index' );
Route::post('/dynamic_dependent/fetch','DynamicDependent@fetch1')->name('dynamicdependent.fetch');
Route::get('sendtxtmail','DynamicDependent@txt_mail');

// Route for mailing
Route::get('/email', function() {
    Mail::to('meghanaas90@gmail.com')->send(new WelcomeMail());
return new WelcomeMail();
});

// Mail Sending Using PHP Mailer
Route::get('/mail','MailController@index' );
Route::post('/send', 'MailController@send')->name('email.send');
