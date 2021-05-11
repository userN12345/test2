@extends('users.layouts.base')

@section('title')
    Order
@endsection

@section('title2')
    Order Page
@endsection

@section('content')

@if($message = Session::get('message'))
    <p class='alert alert-danger text-center'>{{$message}}</p>
@endif

<table style="width: 73%;margin-left: 10%;" class="table mt-4 mb-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Tax</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

      @foreach ($meal_orders as $meal_order)

      <tr>
        <td scope="col">{{$meal_order->id}}</td>
        <td scope="col">{{$meal_order->meal->title}}</td>
        <td scope="col">{{$meal_order->size}}</td>
        <td scope="col">{{$meal_order->price}}</td>
        <td scope="col">{{$meal_order->tax}}</td>
        @php
        $tax = $meal_order->price * $meal_order->quantity * $meal_order->tax/100;
        $total = $meal_order->price * $meal_order->quantity - $tax;
        @endphp
        <td>
            {{$total}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection