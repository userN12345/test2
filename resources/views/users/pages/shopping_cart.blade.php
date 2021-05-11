@extends('users.layouts.base')

@section('title')
    Shopping Cart
@endsection

@section('content')

@if ($message = Session::get('message'))
  <p class='alert alert-success text-center'>{{$message}}</p>
@endif

<div class='container justify-content-cente mt-4 mb-4'>

  @if($items->count() == 0)
  
  @else
  <a href="{{route('add_order')}}"class='btn btn-info mb-3'style='width:300px'>Check Out Now</a>
    
  @endif
    <table style='width: 80%'class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">quentity</th>
        <th scope="col">Total Price</th>
        <th scope="col">Action</th>
      </tr>
    </tbody>
    <tbody style='background:rgb(253, 253, 253);'>

      @if($items->count() >= 1)

      @foreach ($items as $item)
                   
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->quantity}} </td>
        <td>{{$item->price * $item->quantity}}</td>

        <td>
          <a href="{{route('cart_delete',$item->id)}}"class='btn btn-danger'>Delete</a>
          <a href="{{route('cart_update',$item->id)}}"class='btn btn-success'>Quantity++</a>
          <a href="{{route('cart_update_m',$item->id)}}"class='btn btn-info'>Quantity- -</a>
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