@extends('admins.layouts.base')

@section('title')
    Update Category
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
                  <h3 class="card-title">Update Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class='form'role="form"method='POST'action="{{route('update_category_store',$categories->id)}}">
                  @csrf
                  <div class="card-body">
  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name Category</label>
                      <input type="text" class="form-control" name='title'value='{{$categories->title}}'placeholder="Write Category">
                      @error('title')
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