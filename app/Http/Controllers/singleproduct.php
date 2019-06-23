<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_user;
use App\product;
use Auth;
class singleproduct extends Controller
{
    //

    public function product_one($id)
    {
        $product=product::find($id);
        return view('shop-single')->with('product',$product);
    }
    public function AddToWhitelist(Request $request) {
        $whitelist =new product_user;
        $whitelist->user_id=Auth::user()->id;
        $whitelist->product_id=$request->input('product_id');
        $whitelist->save();
        return back(); 
    }
}
