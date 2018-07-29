<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatBox;

class ChatBoxController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
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
        'text_body' => 'required|max:200',
    ]);
    // storing the validated data in the chat_boxes table
    $chat_box = new ChatBox();
    $chat_box->user_id = $request->user_id;
    $chat_box->text_body = $request->text_body;
    $chat_box->save();
    // after storing the data get it and then return the data
    $getMessage = ChatBox::find($request->user_id)->orderBy('id','desc')->first();
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
