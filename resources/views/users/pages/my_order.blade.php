@extends('users.layouts.base')

@section('title')
    Shopping Cart
@endsection

@section('content')

@if ($message = Session::get('message'))
  <p class='alert alert-success text-center'>{{$message}}</p>
@endif

<div class='container justify-content-cente mt-4 mb-4'>

    <table style='width: 80%'class="table">
    <thead class="thead-dark">

      <tr>

        <th scope="col">Id</th>
        <th scope="col">City</th>
        <th scope="col">Address</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </tbody>
    <tbody style='background:rgb(253, 253, 253);'>

        @if($orders->count() >=1)
           
        @foreach ($orders as $order)          
        <tr>
            <td scope="col">{{$order->id}}</td>
            <td scope="col">{{$order->city}}</td>
            <td scope="col">{{$order->address}}</td>
    
            @if($order->status == True)
            <td scope="col" style="color:rgb(38, 216, 38)">Ok</td>
            @else
            <td scope="col" style="color:rgb(199, 96, 27)">Cancel</td>
            @endif
            <td scope="col">
                <a class="btn btn-success" href="{{route('my_order_details',$order->id)}}">Details</a>
                <a class="btn btn-danger" href="{{route('order_delete',$order->id)}}">Delete</a>

            </td>
          </tr>
          @endforeach

        @else

        <tr style="color:rgb(167, 162, 162);">

            <td scope="col">Null</td>
            <td scope="col">Null</td>
            <td scope="col">Null</td>
            <td scope="col">Null</td>
            <td scope="col">Null</td>
    
          </tr>
            
        @endif




        

         
    </tbody>
  </table>



</div>


@endsection