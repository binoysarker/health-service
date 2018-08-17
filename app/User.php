<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Post;
use App\Models\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'date_of_birth',
        'gender',
        'height',
        'weight',
        'blood_group',
        'address',
        'occupation',
        'photo_url',
        'blood_donate_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','admin_status'
    ];
    public function posts()
    {
      return $this->hasMany(Post::class);
    }
    public function profile()
    {
      return $this->hasOne(Profile::class);
    }
}
