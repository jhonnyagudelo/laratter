<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(){
        return $this->hasMany(Message::class)->orderBy('created_at', 'desc');
    }
    public function follows(){
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'followed_id',  'user_id');
    }

    public function isFollowing(User $user){
        return $this->follows->contains($user);
    }

    public function socialProfiles()
    {
        return $this->hasMany(SocialProfile::class);
    }


}
