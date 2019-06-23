@extends('layouts.main')
    @section('content')
        
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
          
          @if(Cart::count()>0)
          
        @if (session()->has('success_message'))
          <h2>{{session()->get('success_message')}}</h2>
        @endif
        <h3>{{Cart::count()}} item(s) in your cart</h3>
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Cart::content() as $item)

                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{asset('storage/'.$item->model->photo)}}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{$item->model->name}}</h2>
                    </td>
                    <td>${{$item->model->price}}</td>
                    <td>
                        <form action="{{action('CartController@updatequantity')}}" method="POST"> 
                          <input type="text" value="{{$item->rowId}}" name="rowId" hidden>
                      
                          
                          @csrf
                      <input type="number" class="form-control text-center" size="2" value="{{$item->qty}}" name="upqty"
               autocomplete="off" MIN="1" MAX="30">
               <button type="submit" class="btn btn-danger btn-sm" name="submit" hidden> update</button>


                    
                      
                      </div>
                    </form>
                    </td>
                    <td>{{$item->price*$item->qty}}$</td>
                    <td>
                        <a style="color: white" type="input" class="btn btn-danger" href="/delete/{{$item->rowId}}"> X</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">

               
<a href="/destroy/"><button class="btn btn-primary btn-sm btn-block" type="submit">Empty Cart</button></a>
                
                

              </div>
              <div class="col-md-6">
               <a href='/shop/'> <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{Cart::subtotal()}}</strong>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">taxes</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{Cart::tax()}}</strong>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{Cart::total()}}</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                        <form action='/addorder/' method="POST">
                          @csrf
                         <button class="btn btn-primary btn-lg btn-block" type="submit">Proceed To Checkout</button>


                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" hidden>
                            <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" hidden>
                            
                        </form>
                  

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      @else
        <h2>there is no items in the cart !!</h2>
    
      @endif
      </div>
    </div>
  
    @endsection
