<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='products';
    protected $fillable = [
         'name', 'description','price','photo','category',
        ];

    public function product_category()
    {
        return $this->belongsTo('App\category', 'category');
    }
    public function whitelist()
    {
        return $this->belongsTo('App\whitelist','whitelist');
    }
  
}
