<?php
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('front_end.health_service.landing_page.landing_page');
});

/**
 * home page section start
 */
Route::prefix('home')->group(function ()
{
  Route::get('/','HomeController@index');
  Route::post('/get-user-info','HomeController@getUserInfo');
  Route::post('/get-singleperson-info','HomeController@getSinglePersonInfo');
  // chat sectioin start
  Route::post('/send-chat-message','ChatBoxController@sendMessage');
  // check user notification
  Route::get('/get-user-notification','HomeController@getUserNotification');

  // profile section start
  Route::get('/user-profile','ProfileController@index')->name('home-profile');
});

// profile section end
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
Route::prefix('admin')->group(function ()
{
  Route::get('/', 'AdminController@index');
  Route::get('notification', 'NotificationController@index');
  Route::post('notification/get-user-info', 'NotificationController@getUserInfo');
  Route::post('notification', 'NotificationController@store');
});
/**
 * admin section end
 */
