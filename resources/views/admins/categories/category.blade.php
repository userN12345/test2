@extends('admins.layouts.base')

@section('title')
    Category
@endsection

@section('title2')
    Category Page
@endsection


@section('content')

@if ($message = Session::get('message'))
    <p class='alert alert-success text-center'>{{$message}}</p>
@endif

<div class='container justify-content-cente'>

  <a style='width: 136px;height: 35px;'class='btn btn-success mb-2'href="{{route('create_category')}}"style='width:100px;height:30px'>create category</a> 

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

      @if($categories->count() >= 1)
      @foreach ($categories as $category)
      <tr>
          <td scope="row">{{$category->id}}</td>
          <td scope="row">{{$category->title}}</td>
          <td scop='row'>
              <a class='btn btn-info btn-sm'href="{{route('update_category',$category->id)}}">Update</a>  
              <a class='btn btn-danger btn-sm'href="{{route('delete_category',$category->id)}}">Delete</a>  
            </td>
       </tr>
      @endforeach
      @else
          

      <tr style="color:rgb(167, 162, 162);">
        <td scope="col">null</td>
        <td scope="col">null</td>
        <td scope="col">null</td>
      </tr>

      @endif
    </tbody>
  </table>
</div>
@endsection

