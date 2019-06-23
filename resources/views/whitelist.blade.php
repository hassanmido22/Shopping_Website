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
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
                @extends('layouts.main')
                @section('content')
                   <div class="container-fluid">
                    <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="row">Order ID</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($list as $item)
                            <tr>
                              <th scope="row">{{$item->id}}</th>
                              <td>{{$item->name}}</td>
                              <td>{{$item->price}}</td>
                            <td><a href='/shop-single/{{$item->product_id}}'>Details</a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                   </div>
                @endsection