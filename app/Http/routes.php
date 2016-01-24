<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::post('/vote', 'Core\VoteController@vote');
    Route::post('/newCharity', 'Core\CharityController@newCharity');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', 'Admin\DashController@dashboard');
    Route::get('/toggleGuests', 'Admin\DashController@toggleGuests');
    Route::get('/toggleSponsors', 'Admin\DashController@toggleSponsors');
    
    Route::get('/video/admin', 'Core\VideoController@pending');
    Route::post('/video/approve', 'Core\VideoController@approve');
    Route::post('/video/deny', 'Core\VideoController@deny');
    
    Route::get('/charity/admin', 'Core\CharityController@pending');
    Route::post('/charity/approve', 'Core\CharityController@approve');
    Route::post('/charity/deny', 'Core\CharityController@deny');
    
    Route::post('/guest/new', 'Admin\DashController@addGuest');      
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    
    Route::get('/vote', 'Core\VoteController@votes');
    
    Route::get('/', function () {
        return view('core.home');
    });
    
    Route::get('/donate', function () {
        return view('core.donateTemp');
    });
    
    Route::get('/about', function () {
        return view('core.about');
    });
    
    Route::get('/credits', function () {
        return view('core.credits');
    });
    
    Route::get('/charity/new', 'Core\CharityController@addCharity');
    Route::post('/charity/save', 'Core\CharityController@newCharity');
    Route::get('/charity/{id}', 'Core\CharityController@charity');
  
    
    Route::get('/video/new', 'Core\VideoController@addVideo');
    Route::post('/video/save', 'Core\VideoController@newVideo');
    Route::get('/video/{id}', 'Core\VideoController@video');
    
    Route::post('/vote', 'Core\VoteController@vote');
    
});