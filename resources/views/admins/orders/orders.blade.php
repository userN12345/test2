@extends('admins.layouts.base')

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

<table style="width: 73%;margin-left: 10%;" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">City</th>
        <th scope="col">Address</th>
        <th scope="col">User Id</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

          
      @foreach ($orders as $order)

      <tr>
        <td scope="col">{{$order->id}}</td>
        <td scope="col">{{$order->city}}</td>
        <td scope="col">{{$order->address}}</td>
        <td scope="col">{{$order->user_id}}</td>

        @if($order->status == True)
        <td scope="col" style="color:rgb(38, 216, 38)">Ok</td>
        @else
        <td scope="col" style="color:rgb(199, 96, 27)">Cancel</td>
        @endif
        <td scope="col">
            @if($order->status == True)
            <a class="btn btn-info" href="{{route('cansel_status_order',$order->id)}}">Cansel</a>
            @else
            <a class="btn btn-info" href="{{route('confirm_status_order',$order->id)}}">Confirm</a> 
            @endif
            <a class="btn btn-success" href="{{route('details_order',$order->id)}}">Details Order</a>

        </td>
      </tr>
      @endforeach      
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    <small>{{$orders->links()}}</small> 
   </div>

@endsection