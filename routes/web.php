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
    Route::get('/createjadwal', 'JadwalTrafficIklanController@createjadwal')->middleware('trafficiklan');
    Route::post('/createjadwal', 'JadwalTrafficIklanController@storejadwal')->middleware('trafficiklan');

    //CreateTemplate
    Route::get('/createtemplate', 'TemplateJadwalController@createtemplate')->middleware('trafficiklan');
    Route::post('/createtemplate/store', 'TemplateJadwalController@tempstoretemplate')->middleware('trafficiklan');
    Route::get('/removesegmen/{id}', 'TemplateJadwalController@removesegmen')->middleware('trafficiklan');
    Route::post('/createtemplate', 'TemplateJadwalController@storetemplate')->middleware('trafficiklan');
    Route::get('/lihattemplate', 'TemplateJadwalController@indextemplate')->middleware('trafficiklan');
    Route::post('/lihattemplate', 'TemplateJadwalcontroller@showtemplate')->middleware('trafficiklan');

    //LihatJadwal
    Route::get('/lihatjadwal', 'JadwalTrafficIklanController@showjadwal')->middleware('trafficiklan');
    Route::post('/lihatjadwal/result', 'JadwalTrafficIklanController@showjadwalresult')->middleware('trafficiklan');

    //KonfirmasiBooking
    Route::get('/konfirmasibooking', 'OrderIklanController@indexrequest')->middleware('trafficiklan');
    Route::post('/konfirmasibooking', 'OrderIklanController@searchrequest')->middleware('trafficiklan');
    Route::get('/konfirmasibooking/{id}', 'OrderIklanController@showkonfirmasibooking')->middleware('trafficiklan');
    Route::post('/konfirmasibooking/konfirmasi', 'OrderIklanController@konfirmasibooking')->middleware('trafficiklan');

    //CariJadwalKosong
    Route::get('/carijadwal', 'JadwalTrafficIklanController@indexcarijadwal')->middleware('marketing');
    Route::post('/carijadwal/result', 'JadwalTrafficIklanController@carijadwalresult')->middleware('marketing');
    Route::post('/keepjadwal', 'JadwalTrafficIklanController@keepjadwal')->middleware('marketing');

    //RequestBooking
    Route::get('/createclient', 'ClientController@createclient')->middleware('marketing');
    Route::post('/createclient', 'ClientController@storeclient')->middleware('marketing');
    Route::get('/lihatclient', 'ClientController@indexclient')->middleware('marketing');
    Route::post('/lihatclient', 'ClientController@searchclient')->middleware('marketing');
    Route::get('/pilihclient/{id}', 'ClientController@showclient')->middleware('marketing');
    Route::get('/createorder', 'OrderIklanController@createorder')->middleware('marketing');
    Route::post('/createorder', 'OrderIklanController@storeorder')->middleware('marketing');

    //LihatRequest
    Route::get('/lihatrequest', 'OrderIklanController@showrequest')->middleware('marketing');
    Route::get('/lihatrequestdetail/{id}', 'OrderIklanController@showrequestdetail')->middleware('marketing');

    //UpdateVersi
    Route::get('/updateversi', 'OrderIklanController@indexorder')->middleware('produksi');
    Route::post('/updateversi', 'OrderIklanController@searchorder')->middleware('produksi');
    Route::get('/updateversi/{id}', 'OrderIklanController@editversi')->middleware('produksi');
    Route::post('/updateversi/update', 'OrderIklanController@updateversi')->middleware('produksi');

    //LihatJadwalFinal
    Route::get('/lihatjadwalfinal', 'JadwalTrafficIklanController@indexjadwalfinal')->middleware('studio');
    Route::post('lihatjadwalfinal/result', 'JadwalTrafficIklanController@showjadwalfinal')->middleware('studio');
    Route::post('lihatjadwalfinal/result/export', 'JadwalTrafficIklanController@exportjadwal')->middleware('studio');
});
