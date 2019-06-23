@extends('layouts.main')
    
@section('content')
    
   

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="shop.html">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Gray Shoe</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="{{asset('storage/'.$product->photo)}}" alt="Image" class="img-fluid">
              </a>
              
            </div>

          </div>
          <div class="col-md-6">
         
            <h2 class="text-black">{{$product->name}}</h2>
            <p>{{$product->description}}</p>

            <p><strong class="text-primary h4">${{$product->price}}</strong></p>
            
            <div class="row">
            <form action='/cart/create' method="POST">
              @csrf
                <input type='hidden' name='name' value={{$product->name}} >
                <input type='hidden' name='id' value="{{$product->id}}" >
                <input type='hidden' name='price' value="{{$product->price}}">
                <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button> </form>
                &nbsp
                <form method='Post' action="/addtowhitelist/">
              @csrf  
              <input type='hidden' name='name' value={{$product->name}} >
              <input type='hidden' name='product_id' value="{{$product->id}}" >
              <input type='hidden' name='price' value="{{$product->price}}">
            <input type='hidden' name="description" value="{{$product->description}}">

            <button type="submit"  class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Whitelist</button> 
            </form>      
          </div> 
           
            
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2">    
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3">
            <div class="nonloop-block-3 owl-carousel">
              @foreach ($pro as $item)

              
              <div class="item">
                <div class="item-entry">
                  <a href="/shop-single/{{$item->id}}" class="product-item md-height bg-gray d-block">
                    <img src="{{asset('storage/'.$item->photo)}}" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="/shop-single/{{$item->id}}">{{$item->name}}</a></h2>
                  <strong class="item-price"> ${{$item->price}}</strong>
                
                </div>
              </div>

      
              @endforeach
              
             
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection
