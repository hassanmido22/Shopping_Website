@extends('layouts.main')

@section('content')
    
    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>Arrivals Sales</h1>
            <p><a href="{{route('Shop')}}" class="btn btn-black rounded-0">Shop Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="images/model_3.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="title-section mb-5">
          <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
        </div>
        <div class="row align-items-stretch">
          <div class="col-lg-8">
            <div class="product-item sm-height full-height bg-gray">
                <a href="#" class="product-category"><span>{{$category3->name}} {{$category3->products->count()}} items</span></a>
              <img src="images/model_4.png" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="product-item sm-height bg-gray mb-4">
            <a href="#" class="product-category"><span>{{$category2->name}} {{$category2->products->count()}} items</span></a>
              <img src="images/model_5.png" alt="Image" class="img-fluid">
            </div>

            <div class="product-item sm-height bg-gray">
            
              <a href="#" class="product-category"><span>{{$category1->name}} {{$category1->products->count()}} items</span></a>

              <img src="images/model_6.png" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>


    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section mb-5 col-12">
            <h2 class="text-uppercase">Popular Products</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($products as $item)
              
          <div class="col-lg-4 col-md-6 item-entry mb-4">
              <a href="{{route('shop-single',$item->id)}}" class="product-item md-height bg-gray d-block">
                <img src="{{asset('storage/'.$item->photo)}}" alt="Image" width="100%" height="100%">
              </a>
              <h2 class="item-title"><a href="{{route('shop-single',$item->id)}}">{{$item->name}}</a></h2>
              <strong class="item-price">${{$item->price}}</strong>
            </div>
        
            @endforeach

        </div>
      </div>
    </div>

   


    <div class="site-blocks-cover inner-page py-5" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>New Shoes</h1>
            <p><a href="{{route('Shop')}}" class="btn btn-black rounded-0">Shop Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="images/model_6.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    @endsection
