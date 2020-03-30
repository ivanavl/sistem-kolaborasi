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

use Illuminate\Support\Facades\Auth;

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);



Route::group(['middleware' => 'auth', 'web'], function() {
    Route::get('/home', 'PagesController@homeIndex');
    Route::get('/', 'PagesController@homeIndex');

    //CreateJadwal
    Route::get('/createjadwal', 'JadwalTrafficIklanController@createjadwal');
    Route::post('/createjadwal', 'JadwalTrafficIklanController@storejadwal');

    //CreateTemplate
    Route::get('/createtemplate', 'TemplateJadwalController@createtemplate');
    Route::post('/createtemplate/store', 'TemplateJadwalController@tempstoretemplate');
    Route::get('/removesegmen/{id}', 'TemplateJadwalController@removesegmen');
    Route::post('/createtemplate', 'TemplateJadwalController@storetemplate');
    Route::get('/lihattemplate', 'TemplateJadwalController@indextemplate');
    Route::post('/lihattemplate', 'TemplateJadwalcontroller@showtemplate');

    //LihatJadwal
    Route::get('/lihatjadwal', 'JadwalTrafficIklanController@showjadwal');
    Route::post('/lihatjadwal', 'JadwalTrafficIklanController@showjadwalresult');

    //KonfirmasiBooking
    Route::get('/konfirmasibooking', 'OrderIklanController@indexrequest');
    Route::post('/konfirmasibooking', 'OrderIklanController@searchrequest');
    Route::get('/konfirmasibooking/{id}', 'OrderIklanController@showkonfirmasibooking');
    Route::post('/konfirmasibooking/konfirmasi', 'OrderIklanController@konfirmasibooking');

    //CariJadwalKosong
    Route::get('/carijadwal', 'JadwalTrafficIklanController@indexcarijadwal');
    Route::post('/carijadwal/result', 'JadwalTrafficIklanController@carijadwalresult');
    Route::post('/keepjadwal', 'JadwalTrafficIklanController@keepjadwal');

    //RequestBooking
    Route::get('/createclient', 'ClientController@createclient');
    Route::post('/createclient', 'ClientController@storeclient');
    Route::get('/lihatclient', 'ClientController@indexclient');
    Route::post('/lihatclient', 'ClientController@searchclient');
    Route::get('/pilihclient/{id}', 'ClientController@showclient');
    Route::get('/createorder', 'OrderIklanController@createorder');
    Route::post('/createorder', 'OrderIklanController@storeorder');

    //LihatRequest
    Route::get('/lihatrequest', 'OrderIklanController@showrequest');
    Route::get('/lihatrequestdetail/{id}', 'OrderIklanController@showrequestdetail');

    //UpdateVersi
    Route::get('/updateversi', 'OrderIklanController@indexorder');
    Route::post('/updateversi', 'OrderIklanController@searchorder');
    Route::get('/updateversi/{id}', 'OrderIklanController@editversi');
    Route::post('/updateversi/update', 'OrderIklanController@updateversi');

    //LihatJadwalFinal
    Route::get('/lihatjadwalfinal', 'JadwalTrafficIklanController@indexjadwalfinal');
    Route::post('lihatjadwalfinal/result', 'JadwalTrafficIklanController@showjadwalfinal');
});
