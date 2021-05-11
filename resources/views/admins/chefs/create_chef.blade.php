@extends('admins.layouts.base')

@section('title')
    Create Chef
@endsection

@section('content')


<div class="wrapper">


  
      <!-- Main content -->
      <section class="content mt-5">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-11">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Chef</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class='form'role="form"method='POST'action="{{route('create_chefs_store')}}"enctype='multipart/form-data'>
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
                      <label for="">content</label>
                      <textarea type="text" class="form-control" name='content'placeholder="Write Content"></textarea>
                      @error('content')
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