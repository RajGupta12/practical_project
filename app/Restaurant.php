<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $fillable = [ 'name',
    'code',
    'description',
    'phone',
    'email',
    'status'];

}
