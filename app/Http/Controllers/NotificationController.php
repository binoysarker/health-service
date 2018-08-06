<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Notifications\UserOffers;

class NotificationController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin_section/notification');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }
  /**
  * get the name from the user table
  */
  public function getUserInfo(Request $request)
  {
    // return $request->all();

    $name = $request->name;
    $user = User::where('name','like',$name.'%')->limit(5)->get(['id','name']);
    return $user;
  }
  /**
   * Send to multiple users
   */
   public function sendToMultipleUsers($users,$title,$message)
   {
     Notification::send($users, new UserOffers([
       'title' => $title,
       'message' => $message,
     ]));
   }
  /**
   * Send to single user
   */
   public function sendToSingleUser($user,$title,$message)
   {
     $user->notify(new UserOffers([
       'title' => $title,
       'message' => $message,
     ]));
   }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // return $request->all();
    // first do the validation
    $validatedData = $request->validate([
      'title' => 'required|max:55',
      'message' => 'required|max:100',
    ]);
    // this part is to send message to single user
    if ($request->picked == null || $request->picked == 'no' || $request->selected == null)
    {
      // now store the notification in the database using notify
      $user = User::find($request->user_id);
      $this->sendToSingleUser($user,$request->title,$request->message);
    }
    // now to send message to many users
    if ($request->picked == 'yes')
    {
      if ($request->selected == 'registered') {
        $allRegisteredUsers = User::get();
        $this->sendToMultipleUsers($allRegisteredUsers,$request->title,$request->message);
      }if ($request->selected == 'blood_donner') {
        $allBloodDonatedUsers = User::where('blood_donate_status',1)->get();
        $this->sendToMultipleUsers($allBloodDonatedUsers,$request->title,$request->message);

      }if ($request->selected == 'not_blood_donner') {
        $allBloodDonatedUsers = User::where('blood_donate_status',0)->get();
        $this->sendToMultipleUsers($allBloodDonatedUsers,$request->title,$request->message);
      }
    }
    return redirect()->back();
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
=======
use App\Events\NotificationPublished;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
	public function index()
	{
		return view('admin_section/notification');
	}
    public function store(Request $request)
    {
    	// return $request->all();
    	$validatedData = $request->validate([
    	        'title' => 'required|max:255',
    	        'description' => 'required',
    	    ]);

	    // get data to be saved in an associative array using $request->only()
	    $data = $request->only(['title', 'description']);

	    //  save notification and assign return value of created notification to $notification array
	    $notification = Notification::create($data);

	    // fire NotificationPublished event after Notification is successfully added to database
	    event(new NotificationPublished($notification));

	    // return notification as response, Laravel automatically serializes this to JSON
	    return response($notification, 201);
    }
>>>>>>> 9836a0ca5838aac6494ef3f951be396cf576cf86
}
