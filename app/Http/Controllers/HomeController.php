<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserOffers;
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
   public function getUserInfo(Request $request)
   {
     // return $request->all();
     // foreach users i am getting from the active users in the laravel echo join part making a query with than and getting specific user information
     foreach ($request->all() as $key => $value) {
       $names = $value['name'];
       $users[] = User::where('name', $names)->take(10)->get(['id','name','photo_url']);
     }
     return $users;
   }
   /**
   * getSinglePersonInfo
   */
   public function getSinglePersonInfo(Request $request)
   {
     // return $request->name;
    $name = $request->name;
    $user = User::where('name',$name)->first(['id','name','photo_url']);
    return $user;
   }
   /**
    * getUserNotification and show it as a desktop notification
    */
    public function getUserNotification()
    {
      $user = User::find(auth()->user()->id);
      foreach ($user->notifications as $notification) {
        $storeNotifications[] = $notification->data['data'];
      }
      if (isset($storeNotifications)) {
        return $storeNotifications;
      }
    }
}
