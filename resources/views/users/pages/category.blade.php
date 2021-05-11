@extends('users.layouts.base')

@section('title')
    Category
@endsection

@section('content')
    

<section class="ftco-section">
    <div class="container">
    <div class="ftco-search">
                <div class="row">

          <div class="col-md-12 tab-wrap">
            
            <div class="tab-content" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                  <div class="row no-gutters d-flex align-items-stretch">
 
                  @if ($meals->count() >= 1)
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
                          <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                          <p><a href="{{route('add_meal',$meal->id)}}" class="btn btn-primary">Shopping Now</a></p>
                      </div>
                  </div>
                </div>
                </div>
                  @endforeach

                  @else
                   <div style="text-align:center;color:rgb(148, 145, 145);">
                    <h1 class="text-center"> no product !!</h1>
                   </div>
                  @endif

                  </div>
              </div>


                </div>

            </div>
          </div>
        </div>
    </div>
    </div>
</section>
    

@endsection