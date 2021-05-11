@extends('admins.layouts.base')

@section('title')
    detalis Meals
@endsection

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div style='width: 70%'class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body text-center">
            <img src="{{asset('upload_image/admin/meals/'.$meals->image)}}"width="45%"height=''alt=>    
            <h2>{{$meals->title}}</h2>
            <p>{{$meals->content}}</p>
            <h5 style="color:green;"> price: {{$meals->price}}$</h5>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <i class="">Name Category: {{$meals->category->title}} </i>
              </div>
              <div class="col-md-4">
                Chef name : {{$meals->chef->name}}
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




</div>

@endsection