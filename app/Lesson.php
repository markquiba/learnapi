<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'body'];

    // hides the field when cast
    // protected $hidden = ['password'];
}
