<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class University extends Authenticatable
{
    protected $guard = 'university';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'decree', 'address', 'country', 'website', 'phone', 'desc', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   }
