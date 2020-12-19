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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('bai-viet','admin\BaiVietController@layDanhSach');
<<<<<<< Updated upstream
Route::get('chitiet','admin\BaiVietController@layBaiVietID');
Route::get('binhluan','admin\BaiVietController@layBinhLuan');
=======
Route::get('login','admin\UserController@layDanhSach');
>>>>>>> Stashed changes
