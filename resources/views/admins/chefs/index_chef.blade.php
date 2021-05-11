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

  <a style='width: 136px;height: 35px;'class='btn btn-success mb-2'href="{{route('create_chefs')}}"style='width:100px;height:30px'>create chefs</a> 
  <table style='width: 80%'class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">content</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

      @if($chefs->count() >= 1)
          
      @foreach ($chefs as $chef)
      <tr>
        <td scope="row">{{$chef->id}}</td>
        <td scope="row">{{$chef->name}}</td>
        @if (isset($chef->content))
        <td scope="row">{{substr($chef->content,0,20)}}</td>
        @else    
         <td scope="row" style="color:rgb(105, 98, 98);">no data !!</td>
        @endif

        <td scop='row'>
          <img src="{{asset('upload_image/admin/Chefs/'.$chef->image)}}"height='60px'width='80px'alt=>    
        </td>
        <td scop='row'>
            <a class='btn btn-success btn-sm'href="{{route('chef_details',$chef->id)}}">Show</a>  
            <a class='btn btn-info btn-sm'href="{{route('update_chef',$chef->id)}}">Update</a>  
            <a class='btn btn-danger btn-sm'href="{{route('delete_chef',$chef->id)}}">Delete</a>  
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
      </tr>
          
      @endif
         
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <small>{{$chefs->links()}}</small> 
   </div>


</div>
@endsection

