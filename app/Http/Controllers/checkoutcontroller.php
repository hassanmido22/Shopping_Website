<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
class checkoutcontroller extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
    public function store(Request $request)
    {           
       Stripe::setApiKey('sk_test_KwNNFRfCznGnvlSJfIwwrWuL00DVpfwoTd');
            Stripe::charges()->create([
                

               
            ]);
            return back();
        } 
        
        
    }

