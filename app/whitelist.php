<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class whitelist extends Model
{
    protected $table='whitelist';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function products()
    {
        return $this->hasMany('App\product');
    }
}
