@extends('admins.layouts.base')

@section('title')
    Chefs Page
@endsection

@section('title2')
    Chefs Page
@endsection

@section('content')



<div class='container justify-content-cente'>

  @if ($message = Session::get('message'))
  <p class='alert alert-success text-center'>{{$message}}</p>
  @endif

  <table style='width: 80%'class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

        <tr>
            <td scope="col">{{$settings->id}}</td>
            <td scope="col">{{$settings->title_site}}</td>
            <td scope="col">{{$settings->email}}</td>
            <td scope="col">{{$settings->phone}}</td>
            <td scope="col">
              <a class='btn btn-success btn-sm'href="{{route('update_settings')}}">Update</a>  
            </td>
           </tr>
        
    </tbody>
  </table>



</div>
@endsection

