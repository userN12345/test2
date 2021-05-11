@extends('admins.layouts.base')

@section('title')
    Dashboard
@endsection

@section('title2')
    Meals Page
@endsection

@section('content')


@if ($message = Session::get('message'))
    <p class='alert alert-success text-center'>{{$message}}</p>
@endif


@if ($message = Session::get('message_delete'))
    <p class='alert alert-danger text-center'>{{$message}}</p>
@endif

<a style='width: 136px;height: 35px;'class='btn btn-success mb-2'href="{{route('create_meal')}}"style='width:100px;height:30px'>create Meals</a> 

<table class="table">
    <thead class="thead-dark">

      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">image</th>
        <th scope="col">price</th>
        <th scope="col">Slug</th>
        <th scope="col">Category</th>
        <th scope="col">Chaf</th>
        <th scope="col">action</th>
      </tr>

    </thead>
    <tbody style='background:rgb(253, 253, 253);'>
      @if($meals->count() >= 1)
          
      @foreach ($meals as $meal)
        <tr>
          <td scope="col">{{$meal->id}}</td>
          <td scope="col">{{$meal->title}}</td>
          <td scope="col">
            <img src="{{asset('upload_image/admin/meals/'.$meal->image)}}"height='60px'alt=>    
          </td>
          <td scope="col">{{$meal->price}}</td>
          <td scope="col">{{$meal->slug}}</td>
          <td scope="col">{{$meal->category->title}}</td>
          <td scope="col">{{$meal->chef->name}}</td>
          <td scope="col">
            <a class='btn btn-success btn-sm'href="{{route('details_meal',$meal->slug)}}">Show</a>    
            <a class='btn btn-info btn-sm'href="{{route('update_meal',$meal->id)}}">Update</a>    
            <a class='btn btn-danger btn-sm'href="{{route('delete_meal',$meal->id)}}">Delete</a> 
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
      </tr>
          
      @endif
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    <small>{{$meals->links()}}</small> 
   </div>

@endsection