<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\product;
class newarrivals_controller extends Controller
{
    //

    public function ViewProduct() {
        $product =product::orderBy("id","DESC")->take(6)->get();    
    return view('new_arrivals')->with('product',$product);
}
}
  

