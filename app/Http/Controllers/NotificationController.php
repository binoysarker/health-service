<?php

namespace App\Http\Controllers;

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
}
