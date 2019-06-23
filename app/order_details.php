<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    protected $table='order_details';
    protected $fillable = [
        'order_id', 'product_id', 'quantity',
        ];

    public function order()
    {
        return $this->belongsTo('App\orders', 'order_id');
    }    

    public function pro()
    {
        return $this->hasOne('App\product','id');
    }
    
}
