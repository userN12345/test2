@extends('admins.layouts.base')

@section('title')
    Create Meals
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
                  <h3 class="card-title">Create Meals</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class='form'role="form"method='POST'action="{{route('create_meal_store')}}"enctype='multipart/form-data'>
                  @csrf
                  <div class="card-body">
  
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" class="form-control" name='title'value=''placeholder="Write Title">
                      @error('title')
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
                    
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name='price'value=''placeholder="Write Price">
                        @error('price')
                          <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                      </div>

                      
                    <div class="form-group">

                      <input type="hidden" class="form-control" name='slug' value="">
                    </div>

                      <label>Category</label>
                      <select name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        @error('category_id')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror  
                    </select>
                    <br>
                    <br>

                    <label>Chef</label>
                    <select name="chef_id">
                        @foreach ($chefs as $chef)
                        <option value="{{$chef->id}}">{{$chef->name}}</option>
                        @endforeach
                        @error('chef_id')
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