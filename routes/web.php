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
    Route::get('/buatjadwal', 'JadwalTrafficIklanController@createjadwal')->middleware('trafficiklan');
    Route::post('/buatjadwal', 'JadwalTrafficIklanController@storejadwal')->middleware('trafficiklan');

    //CreateTemplate
    Route::get('/buattemplat', 'TemplateJadwalController@createtemplate')->middleware('trafficiklan');
    Route::post('/buattemplat/simpan', 'TemplateJadwalController@tempstoretemplate')->middleware('trafficiklan');
    Route::get('/hapussegmen/{id}', 'TemplateJadwalController@removesegmen')->middleware('trafficiklan');
    Route::post('/buattemplat', 'TemplateJadwalController@storetemplate')->middleware('trafficiklan');
    Route::get('/lihattemplat', 'TemplateJadwalController@indextemplate')->middleware('trafficiklan');
    Route::post('/lihattemplat', 'TemplateJadwalcontroller@showtemplate')->middleware('trafficiklan');

    //LihatJadwal
    Route::get('/lihatjadwal', 'JadwalTrafficIklanController@showjadwal')->middleware('trafficiklan');
    Route::post('/lihatjadwal/result', 'JadwalTrafficIklanController@showjadwalresult')->middleware('trafficiklan');

    //KonfirmasiBooking
    Route::get('/konfirmasipemesanan', 'OrderIklanController@indexrequest')->middleware('trafficiklan');
    Route::post('/konfirmasipemesanan', 'OrderIklanController@searchrequest')->middleware('trafficiklan');
    Route::get('/konfirmasipemesanan/{id}', 'OrderIklanController@showkonfirmasibooking')->middleware('trafficiklan');
    Route::post('/konfirmasipemesanan/konfirmasi', 'OrderIklanController@konfirmasibooking')->middleware('trafficiklan');

    //CariJadwalKosong
    Route::get('/carijadwal', 'JadwalTrafficIklanController@indexcarijadwal')->middleware('marketing');
    Route::post('/carijadwal/hasil', 'JadwalTrafficIklanController@carijadwalresult')->middleware('marketing');
    Route::post('/keepjadwal', 'OrderIklanController@keepjadwal')->middleware('marketing');

    //RequestBooking
    Route::get('/buatklien', 'ClientController@createclient')->middleware('marketing');
    Route::post('/buatklien', 'ClientController@storeclient')->middleware('marketing');
    Route::get('/lihatklien', 'ClientController@indexclient')->middleware('marketing');
    Route::post('/lihatklien', 'ClientController@searchclient')->middleware('marketing');
    Route::get('/pilihklien/{id}', 'ClientController@showclient')->middleware('marketing');
    Route::get('/buatorder', 'OrderIklanController@createorder')->middleware('marketing');
    Route::post('/buatorder', 'OrderIklanController@storeorder')->middleware('marketing');

    //LihatRequest
    Route::get('/lihatpermintaan', 'OrderIklanController@showrequest')->middleware('marketing');
    Route::get('/lihatpermintaan/{id}', 'OrderIklanController@showrequestdetail')->middleware('marketing');

    //UpdateVersi
    Route::get('/perbaruiversi', 'OrderIklanController@indexorder')->middleware('produksi');
    Route::post('/perbaruiversi', 'OrderIklanController@searchorder')->middleware('produksi');
    Route::get('/perbaruiversi/{id}', 'OrderIklanController@editversi')->middleware('produksi');
    Route::post('/perbaruiversi/perbarui', 'OrderIklanController@updateversi')->middleware('produksi');

    //LihatJadwalFinal
    Route::get('/lihatjadwalakhir', 'JadwalTrafficIklanController@indexjadwalfinal')->middleware('studio');
    Route::post('lihatjadwalakhir/hasil', 'JadwalTrafficIklanController@showjadwalfinal')->middleware('studio');
    Route::post('lihatjadwalakhir/hasil/export', 'JadwalTrafficIklanController@exportjadwal')->middleware('studio');
});
