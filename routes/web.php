<?php

Route::get('/', function () {
    return view('front_end.health_service.landing_page.landing_page');
});


Route::get('/home','HomeController@index');
