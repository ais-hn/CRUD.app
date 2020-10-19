<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pref extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];
}
