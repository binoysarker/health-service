<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatBox;
use App\Events\ChatEvent;
use App\User;

class ChatBoxController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

  }
  /**
   * send the chat using events
   */
   public function sendMessage(Request $request)
   {
     // return $request->message;
     event( new ChatEvent($request->message, $request->user));
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
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // validation first
    $validatedData = $request->validate([
        'user_id' => 'required|numeric',
        'send_to_user' => 'required|numeric',
        'text_body' => 'required|max:200',
    ]);
    // storing the validated data in the chat_boxes table
    $chat_box = new ChatBox();
    $chat_box->user_id = $request->user_id;
    $chat_box->send_to_user = $request->send_to_user;
    $chat_box->text_body = $request->text_body;
    $chat_box->save();
    // after storing the data get it and then return the data
    $getMessage = ChatBox::where('user_id',$request->user_id)->where('send_to_user',$request->send_to_user)->orderBy('id','desc')->first();
    return $getMessage;

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
}
