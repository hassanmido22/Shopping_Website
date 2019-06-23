@extends('layouts.main')

@section('content')

<style>

  .prod-item
  {
    background-color: white;
    box-shadow: none;
    margin-bottom: 1px;
    border-right: 1px solid #eee;
    border-bottom: 1px solid #eee;
    border: 1px solid #ddd;
    margin: 0;
  }

  .item-entry .item-price
  {
    color: #d1133b; 
  }

  .product-item img
  {
    max-width:250px;
  }

  .sub-title{
    font-size: 20px;
    color: #000;
    font-weight: 500;
    text-transform: uppercase;
    margin-bottom: 50px;
}
  .item-entry .product-item
  {
    background-color:transparent;  
  }

</style>

    <div class="site-blocks-cover inner-page" data-aos="fade">
      <div class="container">
        <div class="row"> 
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
                <h2 class="sub-title">#New Summer Collection 2019</h2>
                <h1>Souq Products</h1>
            </div>
        </div>
        <div class="col-md-6 order-1 align-self-end">
           
          </div>
        </div>
      </div>
    </div>

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
          <div class="site-block-cover content">
              <h2 class="sub-title">Products from souq online shopping</h2>
          </div>
        <div class="row mb-5">
          <div class="col-md-12 order-1">
          
            <div class="row mb-5" id="prod">

                @for($i=0;$i<$collectionImg->count();$i++)
                    <div   class="prod-item col-lg-3 col-md-3 item-entry ">
                    <a href="{{$collectionLink[$i]}}" class="product-item md-height bg-gray d-block">
                        <img src='{{$collectionImg[$i]}}' alt='' srcset=''>
                    </a>
                    <h2 class="item-title"><a href="{{$collectionLink[$i]}}">{{$collectionTitle[$i]}}</a></h2>
                    <strong class="item-price">{{$collectionPrice[$i]}}</strong>
                    </div>

                @endfor

            </div>

          </div>
        </div>
      </div>
    </div>

    

    @endsection
