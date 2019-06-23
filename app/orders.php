<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table='orders';
    protected $fillable = [
         'user_id', 'subtotal','total','taxes',
        ];
    
    public function orderdetails()
    {
        return $this->hasMany('App\order_details');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
