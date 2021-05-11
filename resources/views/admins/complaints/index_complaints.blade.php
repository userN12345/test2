@extends('admins.layouts.base')

@section('title')
    Category
@endsection

@section('title2')
    Complaints Page
@endsection

@section('content')

@if ($message = Session::get('message'))
    <p class='alert alert-danger text-center'>{{$message}}</p>
@endif

<div class='container justify-content-cente'>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Content</th>
        <th scope="col">User</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

      @if($complaints->count() >= 1)
         
    @foreach ($complaints as $complaint)

       <tr>
          <td scope="row">{{$complaint->id}}</td>
          <td scope="row">{{substr($complaint->content,0,20)}}</td>
          <td scope="row">{{$complaint->user->name}}</td>
          <td scop='row'>
            <a class='btn btn-success btn-sm'href="{{route('details_complaints',$complaint->id)}}">Show</a>    
            <a class='btn btn-danger btn-sm'href="{{route('delete_complaints',$complaint->id)}}">Delete</a>  
          </td>
       </tr>

      @endforeach

      @else

      <tr style="color:rgb(167, 162, 162);">
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
      </tr>
          
      @endif

    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <small>{{$complaints->links()}}</small> 
   </div>
</div>
@endsection

