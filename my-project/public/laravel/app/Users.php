<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'm_user';
    protected $fillable = ['email','name','password'];
}
