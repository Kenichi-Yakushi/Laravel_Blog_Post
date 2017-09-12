<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $perPage = 10;
    protected $table = 't_posts';
    protected $fillable = ['title','body','image'];
}
