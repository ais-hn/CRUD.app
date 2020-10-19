<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['birthday','created_at','updated_at'];

    public function pref()
    {
        return $this->belongsTo('App\Pref');
    }
}
