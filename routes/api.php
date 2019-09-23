<?php

use Illuminate\Http\Request;

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

Route::get("/",'Hohuong@index');

Route::get("/products",'Hohuong@products');

Route::get("/category/{id}",'Hohuong@products_cate');

Route::get("/product/{id}",'Hohuong@products_id');

Route::get("/slide",'Hohuong@Slide');

Route::get('/search/{key}','Hohuong@Search');

Route::post('/dathang','Hohuong@dathang');

Route::post('/login','Auth\LoginController@login');

Route::post('/dangky','Auth\LoginController@dangky');

Route::get('/dsdonhang','Hohuong@dsdonhang');