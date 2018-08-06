<?php

Route::get('/', function () {
    return view('front_end.health_service.landing_page.landing_page');
});

/**
 * home page section start
 */

Route::get('/home','HomeController@index');
Route::post('/home/get-user-info','HomeController@getUserInfo');
Route::post('/home/get-singleperson-info','HomeController@getSinglePersonInfo');
// chat sectioin start
Route::post('/home/send-chat-message','ChatBoxController@sendMessage');
<<<<<<< HEAD
// check user notification
Route::get('/home/get-user-notification','HomeController@getUserNotification');
/**
 * home page section end
 */

/**
 * auth routes start
 */
Auth::routes();
/**
 * auth routes end
 */


/**
 * admin section start
 */
Route::get('/admin', 'AdminController@index');
Route::get('/admin/notification', 'NotificationController@index');
Route::post('/admin/notification/get-user-info', 'NotificationController@getUserInfo');
Route::post('/admin/notification', 'NotificationController@store');
/**
 * admin section end
 */
=======

// for admin section
Route::get('/admin', 'NotificationController@index');
Route::post('/admin/send-notification', 'NotificationController@store');
>>>>>>> 9836a0ca5838aac6494ef3f951be396cf576cf86
