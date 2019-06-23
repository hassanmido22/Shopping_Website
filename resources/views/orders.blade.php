@extends('layouts.main')
@section('content')
   <div class="container-fluid">
    <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Total</th>
                <th scope="col">User</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->subtotal}}</td>
              <td>{{$item->total}}</td>
                <td>{{Auth::user()->name}}</td>
            <td><a href='order/{{$item->id}}'>Details</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
   </div>
@endsection