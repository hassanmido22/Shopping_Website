@extends('layouts.main')
@section('content')
<div class="container">
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">product ID</th>
                    <th scope="col">Product picture</th>
                    <th scope="col">product name</th>
                    <th scope="col">product Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($details as $item)
                <tr>
                  <th scope="row">{{$item->id}}</th>
                <td><img src="{{asset('storage/'.$item->pro->photo)}}" alt="Image" width='100px' height="100px"></td>
                    <td>{{$item->pro->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->pro->price *  $item->quantity}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
       </div>
@endsection