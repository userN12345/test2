@extends('users.layouts.base')

@section('title')
    Add Order
@endsection

@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">

    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
                
                <h2 class="h4 mb-2 mb-md-5 font-weight-bold">Add Order</h2>

                <form method="post" action="{{route('add_order_store')}}">
                    @csrf

                    <div class="form-group">
                        <label for="city">City</label>
                        <input name="city" id="city" class="form-control" placeholder="Write Your City" required>
                        @error('city')
                        <small class='alert alert-danger'>{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="address" id="address" class="form-control" placeholder="Write Your Address required">
                        @error('address')
                        <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                    </div>

                    
                        <select name="size" id="size">
                            <option value="small">Small</option>
                            <option value="large">Large</option>
                            <option value="x_large">X Large</option>
                        </select>
                        @error('size')
                        <small class='alert alert-danger'>{{$message}}</small>
                        @enderror
                    
                        <br>
                        <br>

                    <div class="form-group">
                        <input type="submit" value="Send Order" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>

            
            <div class="col-md-6 d-flex align-items-stretch mt-5">
                    <table style='width: 90%'class="table">
                        <thead style="background:snow">
                          <tr>
                    
                            <th scope="col">Name</th>
                            <th scope="col">price</th>
                            <th scope="col">quentity</th>
                            <th scope="col">Tax</th>
                            <th scope="col">Total Price</th>
                          </tr>
                        </thead>
                        <tbody style='background:rgb(253, 253, 253);'>

                         @foreach ($my_carts as $my_cart)
                         
                            <tr>
                              <td>{{$my_cart->name}}</td>
                              <td>{{$my_cart->price}}</td>                            
                              <td>{{$my_cart->quantity}}</td>              
                              <td>{{App\Models\Setting_site::tax()}}</td>
                               @php
                                   $taxs = $my_cart->price * $my_cart->quantity * App\Models\Setting_site::tax()/100;
                                   $total = $my_cart->price * $my_cart->quantity - $taxs;
                               @endphp
                                
                              <td>{{$total}}</td>

                            </tr>         
                            
                            @endforeach
                        </tbody>
                    </table>   
            </div>

        
        </div>
        
    </div>
    {{-- <form method="post" action="{{route('add_order_store')}}">
        @csrf
    <select name="size" id="size">
        <option value="small">Small</option>
        <option value="large">Large</option>
        <option value="x_large">X Large</option>
    </select>
    @error('size')
    <small class='alert alert-danger'>{{$message}}</small>
    @enderror
    </form> --}}
   
</section>

@endsection