<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // now let's make a query to set the online status of the authenticated user
    // $get_auth_user_id = auth()->user()->id;
    // $user = User::find($get_auth_user_id);
    // $user->online_status = 1;
    // $user->save();

    return view('front_end.health_service.home.index');
  }
  /**
   * get all active users
   */
   public function getAllActiveUsers()
   {
     // now get all the authnticated users who are online now
     $all_active_users = User::where('online_status',1)->take(10)->get();
     return $all_active_users;
   }
}
