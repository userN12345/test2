<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([

    'middleware' => 'api',
    'namespace' => 'Apis',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});



Route::group(['namespace'=>'Apis\admin','middleware'=>'auth:api'],function(){
    #user
    route::get('index_auth','UserController@index_auth');
    route::post('Add_auth','UserController@Add_auth');
    route::post('update_auth/{id}','UserController@update_auth');
    route::post('delete_auth/{id}','UserController@delete_auth');

    #categories
    route::get('category_index','CategoryController@category_index');
    route::post('create_category','CategoryController@create_category');
    route::post('update_category/{id}','CategoryController@update_category');
    route::post('delete_category/{id}','CategoryController@delete_category');
    
    #chefs
    route::get('index_chefs','ChefController@index_chefs');
    route::post('create_chefs','ChefController@create_chefs');
    route::post('update_chefs/{id}','ChefController@update_chefs');
    route::get('chef_details/{id}','ChefController@chef_details');
    route::post('delete_chef/{id}','ChefController@delete_chef');

    #complaints
    route::get('index_complaints','ComplaintsController@index_complaints');
    route::get('details_complaints/{id}','ComplaintsController@details_complaints');
    route::post('delete_complaints/{id}','ComplaintsController@delete_complaints');

    #dashboard
    route::get('dashboard','DashboardController@dashboard');

    #meals
    route::get('index_meal','MealController@index_meal');
    route::post('create_meal','MealController@create_meal');
    route::post('update_meal/{id}','MealController@update_meal');
    route::get('details_meal/{slug}','MealController@details_meal');
    route::post('delete_meal/{id}','MealController@delete_meal');

    #orders
    route::get('order','OrderController@order');
    route::post('order_delete/{id}','OrderController@order_delete');

    #reservations
    route::get('index_reservation','ReservationController@index_reservation');
    route::post('delete_reservation/{id}','ReservationController@delete_reservation');

});

Route::group(['namespace'=>'Apis\user','middleware'=>'auth:api'],function(){

    #category
     route::get('category/{id}','CategoryController@category');

     #complaints
     route::post('create_complaints','ComplaintController@create_complaints');

});
