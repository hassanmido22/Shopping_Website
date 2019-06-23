<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $duplicates=Cart::search(function($cartItem,$rowId) use ($request)
        {
            return $cartItem->id == $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect('cart/')->with('message','Item is already in the cart');
        }

        //
        Cart::add($request->id,$request->name,1,$request->price)
            ->associate('App\product');
        return redirect('/cart')->with('success_message','the item was added to your cart !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
    	Cart::remove($id);
    	return redirect()->action('CartController@index');
    }	

    public function updatequantity(Request $request)
    {
       
      // dd($request);
        
       Cart::update($request->rowId,$request->upqty);
      return  redirect()->action('CartController@index');
    }
    
    public function destroy()
    {
        Cart::destroy();
        return back();
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
