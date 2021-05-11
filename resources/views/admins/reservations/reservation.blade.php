@extends('admins.layouts.base')

@section('title')
    Reservaions
@endsection

@section('title2')
    Reservation Page
@endsection

@section('content')

@if($message = Session::get('message_delete'))
    <p class='alert alert-danger text-center'>{{$message}}</p>
@endif



<table class="table">
    <thead class="thead-dark">

      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">staus</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Num Chair</th>
        <th scope="col">action</th>
      </tr>

    </thead>
    <tbody>
       @if($reservaions->count() >= 1)
          
       @foreach ($reservaions as $reservation)
       <tr>
           <td scope="col">{{$reservation->id}}</td>
           <td scope="col">{{$reservation->name}}</td>
           <td scope="col">{{$reservation->email}}</td>
           <td scope="col">{{$reservation->phone}}</td>

         @if($reservation->status == True)
         <td scope="col" style="color:rgb(38, 216, 38)">ِِِActive</td>
         @else
         <td scope="col" style="color:rgb(199, 96, 27)">Cancel</td>
         @endif

           <td scope="col">{{$reservation->date}}</td>
           <td scope="col">{{$reservation->time}}</td>
           <td scope="col">{{$reservation->num_chair}}</td>
           <td scope="col">
               <a class='btn btn-danger btn-sm'href="{{route('delete_reservation',$reservation->id)}}">Delete</a> 
           </td>
         </tr>
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
        <td scope="col">null</td>
        <td scope="col">null</td>
      </tr>
           
       @endif
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    <small>{{$reservaions->links()}}</small> 
   </div>

@endsection

