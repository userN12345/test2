@extends('users.layouts.base')

@section('title')
    Home
@endsection

@section('content')
    


	
<!--about -->
<section class="ftco-section ftco-wrap-about">
  
  @if ($message = Session::get('message'))
  <p class='alert alert-success text-center'>{{$message}}</p>
  @endif
  <br>
  <br>

  <div class="container">
    <div class="row">
      <div class="col-md-7 d-flex">
        <div class="img img-1 mr-md-2" style="background-image: url({{asset('images/about.jpg')}});"></div>
        <div class="img img-2 ml-md-2" style="background-image: url({{asset('images/about-1.jpg')}});"></div>
      </div>
      <div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
        <div class="heading-section mb-4 my-5 my-md-0">
          <span class="subheading">About</span>
          <h2 class="mb-4">Feliciano Restaurant</h2>
        </div>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        <pc class="time">
          <span>Mon - Fri <strong>8 AM - 11 PM</strong></span>
          <span><a href="#">+ 1-978-123-4567</a></span>
        </p>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter">
  <div class="container">
    <div class="row d-md-flex">
      <div class="col-md-9">
        <div class="row d-md-flex align-items-center">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{$meals->count()}}">0</strong>
                <span>Count Meals</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{$chefs->count()}}">0</strong>
                <span>Count Chefs</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{$users->count()}}">0</strong>
                <span>Count Users</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{$orders->count()}}">0</strong>
                <span>Count Orders</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-12 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-4">Catering Services</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
        <div class="media block-6 services d-block">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="flaticon-cake"></span>
          </div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Birthday Party</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
        <div class="media block-6 services d-block">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="flaticon-meeting"></span>
          </div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Business Meetings</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>    
      </div>
      <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
        <div class="media block-6 services d-block">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="flaticon-tray"></span>
          </div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading">Wedding Party</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row no-gutters justify-content-center mb-5 pb-2">
      <div class="col-md-12 text-center heading-section ftco-animate">
        <span class="subheading">Specialties</span>
        <h2 class="mb-4">Our Menu</h2>
      </div>
    </div>
    <div class="row no-gutters d-flex align-items-stretch">

      @foreach ($meals as $meal)
      <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
        <div class="menus d-sm-flex ftco-animate align-items-stretch">
          <img src="{{asset('upload_image/admin/meals/'.$meal->image)}}"width="250px"height='300px'alt=>
          <div class="text d-flex align-items-center">
            <div>
              <div class="d-flex">
                <div class="one-half">
                  <h3>{{$meal->title}}</h3>
                </div>
                <div class="one-forth">
                  <span class="price">{{$meal->price}}</span>
                </div>
              </div>
    
              <p>Chef Name: <span style="color:rgb(119, 116, 116);">{{$meal->chef->name}}</span></p>
    
              <p><a href="{{route('add_meal',$meal->id)}}" class="btn btn-primary">Shopping Now</a></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
  <div class="d-flex mt-4 justify-content-center">
    <p>{{$meals->links()}}</p> 
   </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-12 text-center heading-section ftco-animate">
        <span class="subheading">Chef</span>
        <h2 class="mb-4">Our Master Chef</h2>
      </div>
    </div>	
    <div class="row">

      @foreach ($chefs as $chef)
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <img src="{{asset('upload_image/admin/chefs/'.$chef->image)}}"width="250px"height='300px'alt=>
          <div class="text pt-4">
            <h3>{{$chef->name}}</h3>
            {{-- <span class="position mb-2">Head Chef</span> --}}
            <div class="faded">
              <ul class="ftco-social d-flex">
                <li class="ftco-animate"><a href="www.twitter.com"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="www.facebook.com"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="www.google.com"><span class="icon-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="www.instagram.com"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      @endforeach

    </div>
    <div class="d-flex justify-content-center">
      <small>{{$chefs->links()}}</small> 
     </div>
  </div>
</section>

@auth
<section class="ftco-section img" style="background-image: url({{asset('images/bg_3.jpg')}})" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
        <div class="heading-section ftco-animate mb-5 text-center">
          <span class="subheading">Book a table</span>
          <h2 class="mb-4">Make Reservation</h2>
        </div>
        <form method='post'action="{{route('create_reservation_store')}}">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" readonly class="form-control"name="name"value="{{Auth::user()->name}}">
                @error('name')
                <small class='alert alert-danger'>{{$message}}</small>
              @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" readonly class="form-control"name="email"value="{{Auth::user()->email}}">
                @error('email')
                <small class='alert alert-danger'>{{$message}}</small>
               @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                @error('phone')
                <small class='alert alert-danger'>{{$message}}</small>
               @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Date</label>
                <input type="date" class="form-control"name="date" placeholder="Date">
                @error('date')
                <small class='alert alert-danger'>{{$message}}</small>
               @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Time</label>
                <input type="time" class="form-control"name="time" placeholder="Time">
                @error('time')
                <small class='alert alert-danger'>{{$message}}</small>
               @enderror 
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Number Chair</label>
                <div class="select-wrap one-third">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="num_chair" id="" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                  </select>
                  @error('num_chair')
                  <small class='alert alert-danger'>{{$message}}</small>
                 @enderror 
                </div>
              </div>
            </div>

            <div class="col-md-12 mt-3">
              <div class="form-group text-center">
                <input type="submit" value="Send Reservation" class="btn btn-primary py-3 px-5">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endauth



<section class="ftco-section testimony-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-12 text-center heading-section ftco-animate">
        <span class="subheading">Testimony</span>
        <h2 class="mb-4">Happy Customer</h2>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
          <div class="item">
            <div class="testimony-wrap text-center pb-5">
              <div class="user-img mb-4" style="background-image: url({{asset('images/person_1.jpg')}})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Jason McClean</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap text-center pb-5">
              <div class="user-img mb-4" style="background-image: url({{asset('images/person_2.jpg')}})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Mark Stevenson</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap text-center pb-5">
              <div class="user-img mb-4" style="background-image: url({{asset('images/person_4.jpg')}})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Art Leonard</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>



@endsection