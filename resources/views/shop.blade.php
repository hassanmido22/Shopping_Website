@extends('layouts.main')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>        

<script>
   

    function getMessage(minval,maxval) {
      $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 500,
    values: [ 75, 300 ],
    slide: function( event, ui ) {
        $("#minval").val(ui.values[0]);
        $("#maxval").val(ui.values[1]);
        
		
    }
    
});
Aja(300);
function Aja(amount){
       $.ajax({
          type:'GET',
          url:"{{ url('/shop/')}}",
          dataType:"JSON",
          data :{ 
          minval:amount,
          },
          
          success:function(data) {
            // $("shopProducts").html(data.shopProducts);
           show(data);
          } });
              
        
            
    }
    function show(data){
   /* var mkhtml ='';
       for(int i=0;i<data.length;i++){
      mkhtml+='<div class="row mb-5">';
          
          mkhtml+='<div class="col-lg-6 col-md-6 item-entry mb-4">';
              mkhtml+=' <a href="#" class="product-item md-height bg-gray d-block">';
                 
                  mkhtml+=' </a>';
                  mkhtml+='<h2 class="item-title"><a href="#" >'+data[i].name+'</a></h2>';
                  mkhtml+='  <strong class="item-price">'+data[i].price+'</strong>';
                  mkhtml+='</div>';
                  mkhtml+=' </div>';*/
                 /* for(int i=0;i<data.length;i++){
                  var inner = document.getElementById("prod");
                  var mkhtml ='';
    
      mkhtml+='<div class="row mb-5">'+
          
          '<div class="col-lg-6 col-md-6 item-entry mb-4">'+
              ' <a href="#" class="product-item md-height bg-gray d-block">'+
                 
                  ' </a>'+
                  '<h2 class="item-title"><a href="#" >'+data[i].name+'</a></h2>'+
                  '  <strong class="item-price">'+data[i].price+'</strong>'+
                  '</div>'+
                  ' </div>';*/
                  alert(amount);
                  
       }
              
   
      }; 

 </script>
</head>
    <div class="site-blocks-cover inner-page" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>Arrivals Sales</h1>
            
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

<!-- side bar search filters-->
    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-1">

            <div class="row align">
              <div class="col-md-12 mb-5">
                <div class="float-md-left"><h2 class="text-black h5">Shop All</h2></div>
                
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Latest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Men</a>
                      <a class="dropdown-item" href="#">Women</a>
                      <a class="dropdown-item" href="#">Children</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevance</a>
                      <a class="dropdown-item" href="#">Name, A to Z</a>
                      <a class="dropdown-item" href="#">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Price, low to high</a>
                      <a class="dropdown-item" href="#">Price, high to low</a>
                    </div>
                  </div>
                </div><br>
                @if (count($errors) > 0)
                <div aria-describedby="inputGroup-sizing-sm" class="alert alert-s alert-danger col-md-12">
                    <ul>
                        @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                    
                @endif
                <form action="/search" method="GET" class="col-md-12" >
                  
                  <div class="input-group input-group-sm ">
                    
                       
                       
                          <input type="text" name="query" value="{{request()->input('query')}}" class="form-control"placeholder='search...' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div></form>
              </div>
            </div>
            
                
          
            <div class="row mb-5" id="prod">
                @foreach ($shopProducts as $item)
              <div class="col-lg-6 col-md-6 item-entry mb-4">
              <a href="/shop-single/{{$item->id}}" class="product-item md-height bg-gray d-block">
              <img src='{{asset('storage/'.$item->photo)}}' alt='' srcset=''>
                </a>
              <h2 class="item-title"><a href="/shop-single/{{$item->id}}" >{{$item->name}}</a></h2>
                <strong class="item-price">{{$item->price}} $</strong>
              </div>
              @endforeach
              {{$shopProducts->links()}}
            </div>
          

           
            
            
          </div>

          <div class="col-md-3 order-2 mb-5 mb-md-0"> 
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                @foreach ($category as $item)
              <li class="mb-1"><a href="/category/{{$item->id}}" class="d-flex"><span>{{$item->name}}</span> <span class="text-black ml-auto">({{$item->products->count()}})</span></a></li>

                @endforeach
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <form method="post" action="{{ action('ShopController@amount') }}">
                    {{csrf_field()}}
                                           <p class="row">
                           <input type="number" class="form-control col-sm-4 "placeholder="min" name="minval"id="amount_start"   />
                           &nbsp
                            <input type="number" class="form-control col-sm-4 " style="pull: right" placeholder="max" class="form-control col-sm-5 "name="maxval"id="amount_end"  ></p>
                        
                            &nbsp &nbsp &nbsp &nbsp  <button type="submit" class="btn btn-primary btn-lg pull-right" style="border-radius:20%; " >Filter</button></form>
                                </div>
                              </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    

    @endsection
