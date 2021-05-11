@extends('admins.layouts.base')

@section('title')
    Settings
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
                  <h3 class="card-title">Settings</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class='form'role="form"method='POST'action="{{route('update_settings_store',$settings->id)}}">
                  @csrf
                  <div class="card-body">
  
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" class="form-control" name='title_site'value='{{$settings->title_site}}'placeholder="Write Title">
                      @error('title_site')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name='email'value='{{$settings->email}}'placeholder="Write Email">
                        @error('email')
                          <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name='phone'value='{{$settings->phone}}'placeholder="Write Phone">
                        @error('phone')
                          <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="">Tax</label>
                        <input type="text" class="form-control" name='tax'value='{{$settings->tax}}'placeholder="Write Tax">
                        @error('tax')
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