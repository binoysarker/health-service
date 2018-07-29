<?php

Route::get('/', function () {
    return view('front_end.health_service.landing_page.landing_page');
});


Route::get('/home','HomeController@index');

Auth::routes();
// chat sectioin start
Route::resource('/home/chat-box','ChatBoxController');
