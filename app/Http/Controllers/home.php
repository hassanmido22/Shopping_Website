<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
class home extends Controller
{
    public function hom()
    {
        $products=product::inRandomOrder(6)->get();
        $category=category::first();
        $category2=category::orderBy('id','ASCE')->first();
        $category3=category::orderBy('id','DESC')->first();
        return view('index')->with([
            'products'=>$products,
            'category1'=>$category,
            'category2'=>$category2,
            'category3'=>$category3
        ]);

    }
}       
