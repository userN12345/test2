@extends('users.layouts.base')

@section('title')
    My Reservation Page
@endsection

@section('title2')
    My Reservation Page
@endsection

@section('content')

@if ($message = Session::get('message'))
    <p class='alert alert-danger text-center'>{{$message}}</p>
@endif



<div class='container justify-content-cente mt-4 mb-4'>
    <h4>My Reservations</h4>
    <table style='width: 100%'class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">phone</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Chair Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

      @if($reservations->count() >= 1)

      @foreach ($reservations as $reservation)
      
      @if($reservation->status == True)
          
        <tr>

          <td scope="col">{{$reservation->name}}</td>
          <td scope="col">{{$reservation->email}}</td>
          <td scope="col">{{$reservation->phone}}</td>
          <td scope="col">{{$reservation->date}}</td>
          <td scope="col">{{$reservation->time}}</td>
          <td scope="col">{{$reservation->num_chair}}</td>
          <td scope="col">
              <a class='btn btn-danger'href="{{route('cancel_reservation',$reservation->id)}}">Cancel Reservation</a>
          </td>
        </tr>

        @endif

      @endforeach 

      @else 
      <tr style="color:rgb(167, 162, 162);">
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
      </tr> 
    

     @endif

      

     

    </tbody>
  </table>



</div>
@endsection
