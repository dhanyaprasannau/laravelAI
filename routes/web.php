<?php

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

// Route::get('/', function () {
//     // return view('welcome');
//     return 'Welcome AI';
// });

Route::get('/', 'HomeController@index');
Route::post('upload-images','ImageUploadController@index');



Route::get('s3-image-upload','HomeController@imageUpload');

Route::post('s3-image-upload','HomeController@uploadFileToS3');
Route::get('show-image','HomeController@showImage');

Route::post('s3-image-upload','ImageUploadController@imageUpload');

Route::post('uploadImage','ImageUploadController@uploadImages') ;