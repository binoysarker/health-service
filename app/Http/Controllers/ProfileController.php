<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    if (isset(auth()->user()->name)) {
      return view('front_end/health_service/home/profile');
    }
    else {
      return redirect('/home');
    }
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
  * getUserProfileInfo
  */
  public function getUserProfileInfo()
  {
    // search for user and get profile info according to user
    $user = Profile::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
    return $user;
  }
  /**
  * sendPostData
  */
  public function sendPostData(Request $request)
  {
    // return $request->all();
    // finding the auth user id in profiles table and table the post
    if ($request->profile_uploaded_posts) {
      // validation for the file
      $validator = Validator::make($request->all(), [
        'profile_uploaded_posts' =>'required|string|max:191'
      ]);
      if ($validator->fails()) {
        return $validator->errors();
      }
      $post = new Post;
      $post->user_id = auth()->user()->id;
      $post->profile_uploaded_posts = $request->profile_uploaded_posts;
      $post->save();
      // now get last 5 posts of specific user
      $posts = Post::find(auth()->user()->id)->orderBy('id','desc')->limit(5)->get();
      return $posts;
    }
    if ($request->hasFile('profile_uploaded_posts_picture')) {
      // validation for the file
      $validator = Validator::make($request->all(), [
        'profile_uploaded_posts_picture' =>'required|file|max:1024'
      ]);
      if ($validator->fails()) {
        return $validator->errors();
      }else {
        // $extension = $request->profile_uploaded_posts_picture->extension();
        $stored_file_path = Storage::putFile('public/users/profile/posts/images',$request->file('profile_uploaded_posts_picture'));
        // now to save the picture path in the posts tables
        $posts = new Post;
        $posts->user_id = auth()->user()->id;
        $posts->profile_uploaded_photo = $stored_file_path;
        $posts->save();
      }
    }
  }
  /**
   * getUserAllPostData
   */
   public function getUserAllPostData()
   {
     // now get last 5 posts of specific user
     $posts = Post::find(auth()->user()->id)->orderBy('id','desc')->limit(5)->get();
     return $posts;
   }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    if ($request->hasFile('profileFile')) {
      $extension = $request->profileFile->extension();
      $stored_file_path = Storage::putFileAs('public/users/profile/images',$request->file('profileFile'),'profile_poster_'.auth()->user()->name.'.'.$extension);
      // now to save the storage path in the profiles table in db
      $profile = new Profile();
      if ($profile->user_id != auth()->user()->id) {
        $profile->user_id = auth()->user()->id;
        $profile->profile_poster_url = $stored_file_path;
        $profile->save();
      }
    }
    elseif ($request->hasFile('profilePictureFile')) {
      $extension = $request->profilePictureFile->extension();
      $stored_file_path = Storage::putFileAs('public/users/profile/images',$request->file('profilePictureFile'),'profile_picture_'.auth()->user()->name.'.'.$extension);
      // now to save the storage path in the users table in db
      $user = User::find(auth()->user()->id);
      $user->photo_url = $stored_file_path;
      $user->save();
    }

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Profile  $profile
  * @return \Illuminate\Http\Response
  */
  public function show(Profile $profile)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Profile  $profile
  * @return \Illuminate\Http\Response
  */
  public function edit(Profile $profile)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Profile  $profile
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Profile $profile)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Profile  $profile
  * @return \Illuminate\Http\Response
  */
  public function destroy(Profile $profile)
  {
    //
  }
}
