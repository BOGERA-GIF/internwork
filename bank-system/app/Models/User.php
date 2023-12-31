<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{ 
    protected $guard = 'users';
    protected $fillable = ['first_name', 'last_name', 'email', 'password' ,  'phone' , 'designation', 'business_email']; // use HasApiTokens, HasFactory, Notifiable;

};