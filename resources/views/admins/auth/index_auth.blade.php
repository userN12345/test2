@extends('admins.layouts.base')

@section('title')
    Users Page
@endsection

@section('title2')
    Auth Page
@endsection

@section('content')


@if ($message = Session::get('message'))
    <p class='alert alert-success text-center'>{{$message}}</p>
@endif

<a style='width: 136px;height: 35px;'class='btn btn-success mb-2'href="{{route('create_auth')}}"style='width:100px;height:30px'>create User</a> 
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Role</th>
        <th scope="col">Block</th>
        <th scope="col">phone</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

      @if($users->count() >= 1)
          
      @foreach ($users as $user)
        <tr>
            <td scope="row">{{$user->id}}</td>
            <td scope="row">{{$user->name}}</td>
            <td scop='row'>{{$user->email}}</td>
            <td scop='row'>
              <img src="{{asset('upload_image/users/'.$user->image)}}"height='80px' width="100px" alt=>
            </td>
            <td scop='row'>{{$user->role}}</td>

            @if($user->block == true)
            <td style="color:red;" scop='row'>Block</td>
            @else
            <td style="color:green;" scop='row'>Unblock</td>                
            @endif

            @if (!$user->phone)
                <td style="color:red">no phone</td>
            @else
            <td scop='row'>{{$user->phone}}</td>
            @endif

            <td scop='row'>
              <a class='btn btn-info btn-sm'href="{{route('update_auth',$user->id)}}">Update</a>  
              <a class='btn btn-danger btn-sm'href="{{route('delete_auth',$user->id)}}">Delete</a> 
              @if ($user->block == True)
              <a class='btn btn-secondary btn-sm'href="{{route('unblock_auth',$user->id)}}">UnBlock</a> 
              @else
              <a class='btn btn-secondary btn-sm'href="{{route('block_auth',$user->id)}}">Block</a> 
              @endif
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
      </tr>

          
      @endif
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <small>{{$users->links()}}</small> 
   </div>

@endsection