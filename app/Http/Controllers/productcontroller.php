<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
class productcontroller extends Controller
{
    public function single_one($id)
    {   $pro=product::inRandomOrder(4)->get();
        $product=product::find($id);
        return view('shop-single')->with(['product'=>$product,
                                            'pro'=>$pro
        ]);
        
    }
  
}
