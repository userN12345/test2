@extends('users.layouts.base')

@section('title')
    Update Account
@endsection

@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">

    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
                <h2 class="h4 mb-2 mb-md-5 font-weight-bold">Update Account</h2>


    <form method="post" action="{{route('update_account_store',Auth::user()->id)}}">
                    @csrf

                

        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Write Your Name"/>
            @error('name')
            <small class='alert alert-danger'>{{$message}}</small>
          @enderror 
        </div>

        <div class="form-group">
            <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Write Your Email"/>
            @error('email')
            <small class='alert alert-danger'>{{$message}}</small>
          @enderror 
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Write Your Password"/>
            @error('password')
            <small class='alert alert-danger'>{{$message}}</small>
          @enderror 
        </div>

        <div class="form-group">
            <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="Write Your Phone"/>
            @error('phone')
            <small class='alert alert-danger'>{{$message}}</small>
          @enderror 
        </div>


        <div class="form-group">
            <input type="submit" value="Send Order" class="btn btn-primary py-3 px-5">
        </div>
    </form>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
<div class="container">
<div class="row d-flex contact-info">
  <div class="col-md-12 mb-4">
    <h2 class="h4 font-weight-bold">Contact Information</h2>
  </div>
  <div class="w-100"></div>
  <div class="col-md-3 d-flex">
      <div class="dbox">
        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
    </div>
  </div>
  <div class="col-md-3 d-flex">
      <div class="dbox">
        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
    </div>
  </div>
  <div class="col-md-3 d-flex">
      <div class="dbox">
        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
    </div>
  </div>
  <div class="col-md-3 d-flex">
      <div class="dbox">
        <p><span>Website</span> <a href="#">yoursite.com</a></p>
    </div>
  </div>
</div>
</div>
</section>



@endsection