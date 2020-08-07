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

// Example Routes
// Route::view('/', 'landing');
// Route::match(['get', 'post'], '/dashboard', function(){
//     return view('dashboard');
// });
// Route::view('/examples/plugin', 'examples.plugin');
// Route::view('/examples/blank', 'examples.blank');

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/validasiVote', 'FrontendController@validasi_vote');
Route::post('/postValidasiVote', 'FrontendController@post_validasi_vote');
Route::get('/voting', 'FrontendController@voting');
Route::post('/postVoting', 'FrontendController@postVoting');
Route::get('/logoutVoting', 'FrontendController@logoutVoting');
Route::get('/logoutFinishVoting', 'FrontendController@logoutFinishVoting');

// Route::group(['middleware' => ['authVoting', 'checkRoleVoting:siswa, guru, staff']], function(){
//     Route::get('/voting', 'FrontendController@voting');
// });



Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');



Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/{siswa}', 'SiswaController@edit')->name('siswa.edit');
    Route::post('/siswa/{siswa}/update', 'SiswaController@update');
    Route::delete('/siswa/{siswa}', 'SiswaController@delete')->name('siswa.delete');

    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{guru}', 'GuruController@edit')->name('guru.edit');
    Route::post('/guru/{guru}/update', 'GuruController@update');
    Route::delete('/guru/{guru}', 'GuruController@delete')->name('guru.delete');

    Route::get('/staff', 'StaffController@index');
    Route::post('/staff/create', 'StaffController@create');
    Route::get('/staff/{staff}', 'StaffController@edit')->name('staff.edit');
    Route::post('/staff/{staff}/update', 'StaffController@update');
    Route::delete('/staff/{staff}', 'StaffController@delete')->name('staff.delete');

    Route::get('/kandidat', 'KandidatController@index');
    Route::post('/kandidat/create', 'KandidatController@create');
    Route::get('/kandidat/{kandidat}', 'KandidatController@edit')->name('kandidat.edit');
    Route::post('/kandidat/{kandidat}/update', 'KandidatController@update');
    Route::get('/kandidat/{kandidat}/delete', 'KandidatController@delete')->name('kandidat.delete');

    Route::get('/voters', 'VotersController@index');
    Route::delete('/voters/{voters}', 'VotersController@delete')->name('voters.delete');

    Route::get('/waktu', 'WaktuController@index');

    Route::post('/waktuMulai/{waktuMulai}/update', 'WaktuMulaiController@update');

    Route::post('/waktuTampil/{waktuTampil}/update', 'WaktuTampilController@update');
});

Route::get('getdatasiswa', [
    'uses' => 'SiswaController@getdatasiswa',
    'as' => 'ajax.get.data.siswa',
]);

Route::get('getdatasiswa2/{nis}', [
    'uses' => 'KandidatController@getdatasiswa2',
    'as' => 'ajax.get.data.siswa2',
]);

Route::get('getdataguru', [
    'uses' => 'GuruController@getdataguru',
    'as' => 'ajax.get.data.guru',
]);

Route::get('getdatastaff', [
    'uses' => 'StaffController@getdatastaff',
    'as' => 'ajax.get.data.staff',
]);

Route::get('getdatavoters', [
    'uses' => 'VotersController@getdatavoters',
    'as' => 'ajax.get.data.voters',
]);