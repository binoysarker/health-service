<?php

Route::get('/', function () {
    return view('front_end.health_service.landing_page.landing_page');
});


Route::get('/home','HomeController@index');
Route::post('/home/get-user-info','HomeController@store');
// auth routes
Auth::routes();
// chat sectioin start
Route::post('/home/send-chat-message','ChatBoxController@sendMessage');
