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

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@homeIndex');

//CreateJadwal
Route::get('/createjadwal', 'JadwalTrafficIklanController@createjadwal');
Route::put('jadwaltrafficiklan', 'JadwalTrafficIklanController@storejadwal');

//CreateTemplate
Route::get('/createtemplate', 'TemplateJadwalController@createtemplate');
Route::put('templatejadwal', 'TemplateJadwalController@storetemplate');
Route::get('/lihattemplate', 'TemplateJadwalController@indextemplate');
Route::get('/lihattemplate/{id}', 'TemplateJadwalcontroller@showtemplate');

//LihatJadwal
Route::get('/lihatjadwal', 'JadwalTrafficIklan@showjadwal');

//CariJadwalKosong
Route::get('/carijadwal', 'JadwalTrafficIklanController@indexcarijadwal');
Route::get('/carijadwal/result', 'JadwalTrafficIklanController@result');

//RequestBookingJadwal
Route::get('/requestbooking/createclient', 'ClientController@createclient');
Route::get('/requestbooking/cariclient', 'ClientController@indexclient');
Route::get('/requestbooking/createorder', 'OrderIklan@createiklan');

//LihatRequest
Route::get('/lihatrequest', 'JadwalTrafficIklanController@indexcarijadwal');

//KonfirmasiBooking
Route::get('/konfirmasibooking', 'JadwalTrafficIklanController@indexcarijadwal');

//UpdateVersi

//LihatJadwalFinal
?>