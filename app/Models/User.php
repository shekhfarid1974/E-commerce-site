<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

define('ADMIN', 1);
define('EDITOR', 2);
define('USER', 3);

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
  public  function isAdmin(){
        $admin = (auth()->user()->role_id == ADMIN) ? true: false;
        return $admin;
    }
  public  function isEditor(){    
        $editor = (auth()->user()->role_id == EDITOR) ? true: false;
        return $editor;
    }
  public  function isUser(){
        $user = (auth()->user()->role_id == USER) ? true: false;
        return $user;
    }
}
