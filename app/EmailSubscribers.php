<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSubscribers extends Model
{
    protected $fillable = ['email', 'status'];
}
