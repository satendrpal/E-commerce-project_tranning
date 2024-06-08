<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Authcontroller;
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

// Route::get('/logout', function () {
//     session::forget('userId');
//     return view('/');
// });
Route::get('/check',[Authcontroller::class,'check_mail']);
Route::post('/check_insert',[Authcontroller::class,'check_insert']);

Route::get('/','HomeController@index');
// Route::get('/','HomeController@index2');
Route::get('/register','HomeController@register');
Route::post('/postregister','HomeController@postregister');
Route::get('/login','HomeController@login');
Route::post('/postlogin','HomeController@loginUser');
Route::get('/dashboard',[HomeController::class,'indexview']);
Route::get('/product',[Authcontroller::class,'productview']);
Route::post('/Addproduct',[Authcontroller::class,'Addproduct']);
Route::get('/category',[Authcontroller::class,'categoryview']);
Route::post('/Addproductas',[Authcontroller::class,'Addproduct']);
Route::post('/category_insert',[Authcontroller::class,'category_insert']);
Route::get('/Addproductview',[Authcontroller::class,'Addproductview']);
Route::post('/addtocard',[Authcontroller::class,'addtocard']);
Route::get('/Addtocardview/{id}',[Authcontroller::class,'Addtocardview']);
Route::get('/logout',[HomeController::class,'logout']);
Route::get('/cardlist',[Authcontroller::class,'cardlist']);
Route::get('/remove/{id}',[Authcontroller::class,'remove']);
Route::get('/edit/{id}',[Authcontroller::class,'edit']);
Route::get('/checkout',[Authcontroller::class,'checkout']);
Route::get('/buy_view',[Authcontroller::class,'buy_view']);
Route::post('/update_product',[Authcontroller::class,'update_product']);
Route::get('/order',[Authcontroller::class,'order']);
Route::post('/order_place',[Authcontroller::class,'check']);
Route::post('/quantity_update',[Authcontroller::class,'quantity_update']);
Route::get('/myorder',[Authcontroller::class,'myorder']);
Route::get('/order_view/{id}',[Authcontroller::class,'order_view']);
Route::get('/forget',[Authcontroller::class,'forget']);
Route::post('/forgetpassword',[Authcontroller::class,'forgetpassword']);
Route::get('/changepassword',[Authcontroller::class,'changepassword']);
Route::post('/updatepassword',[Authcontroller::class,'updatepassword']);
Route::get('/wishlist',[Authcontroller::class,'wishlist']);
Route::get('/rating_get',[Authcontroller::class,'rating_get']);
Route::get('/rating_data',[Authcontroller::class,'rating_data']);
Route::post('/send_rating',[Authcontroller::class,'send_rating']);
Route::get('/remove_wishlist/{id}',[Authcontroller::class,'remove_wishlist']);
Route::post('/addwishlist',[Authcontroller::class,'addwishlist']);
Route::get('/get_cate',[Authcontroller::class,'get_cate']);
Route::get('/category_data',[Authcontroller::class,'category_data']);
Route::get('/logoutadmin',[Authcontroller::class,'logoutadmin']);
Route::get('/cate_delete/{id}',[Authcontroller::class,'cate_delete']);
Route::post('/changeStatus',[Authcontroller::class,'changeStatus']);
Route::post('/wellet_get',[Authcontroller::class,'wellet_get']);
Route::post('/delivery_update',[Authcontroller::class,'delivery_update']);
Route::post('/search',[Authcontroller::class,'search']);
Route::get('/user_pdf',[Authcontroller::class,'user_pdf']);

Route::get('/mail_send',[Authcontroller::class,'mail_send']);


Route::get('/check_page',[HomeController::class,'check_page']);