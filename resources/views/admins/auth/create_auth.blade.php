@extends('admins.layouts.base')

@section('title')
    Create User
@endsection



@section('content')


<div class="wrapper">



  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class='form'role="form"method='POST'action="{{route('create_auth_store')}}"enctype='multipart/form-data'>
                  @csrf
                  <div class="card-body">
  
                    <div class="form-group">
                      <label for="">name</label>
                      <input type="text" class="form-control" name='name'value=''placeholder="Write Name">
                      @error('name')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" name='email'value=''placeholder="Write Email">
                      @error('email')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name='password'value=''placeholder="Write Password">
                        @error('password')
                          <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name='phone'value=''placeholder="Write Phone">
                        @error('phone')
                          <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                      </div>


                    <div class="form-group">
                      <label for="">image</label>
                      <input type="file" class="form-control" name='image'value=''placeholder="Upload Image">
                      @error('image')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror
                    </div>

                    <select name="role">
                        <option value="admin">admin</option>
                        <option value="supervisor">supervisor</option>
                        <option value="user">user</option>
                        @error('role')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror  
                    </select>
  
                     <div class="form-check">
            
                      <label class="form-check-label" for="exampleCheck1"></label>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
             <!-- /.card -->

@endsection