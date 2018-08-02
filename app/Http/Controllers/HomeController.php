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
    return view('front_end.health_service.home.index');
  }
  /**
   * get user info
   */
   public function store(Request $request)
   {
     // return $request->all();
     // foreach users i am getting from the active users in the laravel echo join part making a query with than and getting specific user information
     foreach ($request->all() as $key => $value) {
       $names = $value['name'];
       $users[] = User::where('name', $names)->take(10)->get(['id','name','photo_url']);
     }
     return $users;
   }
}
