<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='product_categories';

    public function products()
    {
        return $this->hasMany('App\product','category');
    }
}
