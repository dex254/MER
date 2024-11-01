<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
class Staff extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
   protected $table = 'staff';


    protected $fillable = [
     'name',
    'idnumber',
     'phone',
     'email',
    'department',
    'designation',
    'campus',
     'password',
     'is_online'


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
