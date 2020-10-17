<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSpam extends Model
{
    protected $fillable = ['title','body','recepients_type','recepients_custom'];
}
