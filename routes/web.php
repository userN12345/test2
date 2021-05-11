<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout',function(){
    Auth::logout();
    return redirect('login')->with('message','you logout now !!');
  })->name('logout_site');
  
///////////////////// start Admin /////////////////////////////////

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin']],function(){

    route::get('dashboard','DashboardController@dashboard')->name('dashboard');

    //category
    route::get('category_index','CategoryController@category_index')->name('category_index');
    route::get('create_category','CategoryController@create_category')->name('create_category');
    route::post('create_category_store','CategoryController@create_category_store')->name('create_category_store');
    route::get('update_category/{id}','CategoryController@update_category')->name('update_category');
    route::post('update_category_store/{id}','CategoryController@update_category_store')->name('update_category_store');
    route::get('delete_category/{id}','CategoryController@delete_category')->name('delete_category');

    //chefs
    route::get('index_chefs','ChefController@index_chefs')->name('index_chefs');
    route::get('create_chefs','ChefController@create_chefs')->name('create_chefs');
    route::post('create_chefs_store','ChefController@create_chefs_store')->name('create_chefs_store');
    route::get('update_chef/{id}','ChefController@update_chef')->name('update_chef');
    route::post('update_chefs_store/{id}','ChefController@update_chefs_store')->name('update_chefs_store');
    route::get('chef_details/{id}','ChefController@chef_details')->name('chef_details');
    route::get('delete_chef/{id}','ChefController@delete_chef')->name('delete_chef');

    //meal 
    route::get('meals','MealController@meals')->name('meals');
    route::get('create_meal','MealController@create_meal')->name('create_meal');
    route::post('create_meal_store','MealController@create_meal_store')->name('create_meal_store');
    route::get('update_meal/{id}','MealController@update_meal')->name('update_meal');
    route::post('update_meal_store/{id}','MealController@update_meal_store')->name('update_meal_store');
    route::get('details_meal/{slug}','MealController@details_meal')->name('details_meal');
    route::get('delete_meal/{slug}','MealController@delete_meal')->name('delete_meal');

    //users
    route::get('index_auth','AuthController@index_auth')->name('index_auth');
    route::get('create_auth','AuthController@create_auth')->name('create_auth');
    route::post('create_auth_store','AuthController@create_auth_store')->name('create_auth_store');
    route::get('update_auth/{id}','AuthController@update_auth')->name('update_auth');
    route::post('update_auth_store/{id}','AuthController@update_auth_store')->name('update_auth_store');
    route::get('delete_auth/{id}','AuthController@delete_auth')->name('delete_auth');
    route::get('block_auth/{id}','AuthController@block_auth')->name('block_auth');
    route::get('unblock_auth/{id}','AuthController@unblock_auth')->name('unblock_auth');

    //complaints
    route::get('index_complaints','CompaintsController@index_complaints')->name('index_complaints');
    route::get('details_complaints/{id}','CompaintsController@details_complaints')->name('details_complaints');
    route::get('delete_complaints/{id}','CompaintsController@delete_complaints')->name('delete_complaints');

    //order
    route::get('order','OrderController@order')->name('order');
    route::get('details_order/{id}','OrderController@details_order')->name('details_order');
    route::get('cansel_status_order/{id}','OrderController@cansel_status_order')->name('cansel_status_order');
    route::get('confirm_status_order/{id}','OrderController@confirm_status_order')->name('confirm_status_order');

    //reservation الحجوزات
    route::get('reservation','ReservationController@index_reservation')->name('reservation');
    route::get('delete_reservation/{id}','ReservationController@delete_reservation')->name('delete_reservation');

    //settings
    route::get('settings','SettingsController@settings')->name('settings');
    route::get('update_settings','SettingsController@update_settings')->name('update_settings');
    route::post('update_settings_store/{id}','SettingsController@update_settings_store')->name('update_settings_store');
});


//////////////////// end Admin //////////////////////////////////////

//////////////////// start user //////////////////////////////////////


Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['blockuser','auth']],function(){
    route::get('/','HomeController@home_site')->name('home_site');
    
    #account
    route::get('update_account','AccountController@update_account')->name('update_account');
    route::post('update_account_store/{id}','AccountController@update_account_store')->name('update_account_store');

    #reservations
    route::post('create_reservation_store','HomeController@create_reservation_store')->name('create_reservation_store');
    route::get('my_reservation','HomeController@my_reservation')->name('my_reservation');
    route::get('cancel_reservation/{id}','HomeController@cancel_reservation')->name('cancel_reservation');
   
   #category
   route::get('category/{id}','CategoryController@category')->name('category');

   #complaints
   route::get('complaints','ComplaintController@complaints')->name('complaints');
   route::post('create_complaints','ComplaintController@create_complaints')->name('create_complaints');

    #meal 
    route::get('add_meal/{id}','MealController@AddMeal')->name('add_meal');
    route::get('cart_show','MealController@cart_show')->name('cart_show');
    route::get('cart_update/{id}','MealController@cart_update')->name('cart_update');
    route::get('cart_update_m/{id}','MealController@cart_update_m')->name('cart_update_m');
    route::get('cart_delete/{id}','MealController@cart_delete')->name('cart_delete');

    #order
    route::get('add_order','OrderUserController@add_order')->name('add_order');
    route::post('add_order_store','OrderUserController@add_order_store')->name('add_order_store');
    route::get('my_order','OrderUserController@my_order')->name('my_order');
    route::get('my_order_details/{id}','OrderUserController@my_order_details')->name('my_order_details');
    route::get('order_delete/{id}','OrderUserController@order_delete')->name('order_delete');

    #paypal    
    Route::get('handle-payment', 'PayPalPaymentController@handlePayment')->name('make.payment');
    Route::get('cancel-payment', 'PayPalPaymentController@paymentCancel')->name('cancel.payment');
    Route::get('payment-success', 'PayPalPaymentController@paymentSuccess')->name('success.payment');


    


});

//////////////////// end user //////////////////////////////////////
