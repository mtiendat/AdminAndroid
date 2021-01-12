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
Route::get('bai-viet','API\BaiVietController@layDanhSach');
Route::get('chitiet','API\BaiVietController@layBaiVietID');
Route::post('tin-da-xem','API\BaiVietController@dsTinDaXem');
Route::get('binhluan','API\BinhLuanController@layBinhLuan');
Route::get('binhluanbyid','API\BinhLuanController@getBLbyID');
Route::post('dang-ky', 'API\UserController@dangKy');
Route::post('dang-binhluan', 'API\BinhLuanController@postBinhLuan');
Route::get('tim-kiem-user', 'API\UserController@TimKiemUser');
Route::post('dang-nhap', 'API\UserController@dangNhap');
Route::post('quenmatkhau','API\UserController@quenmatkhau');
Route::get('timkiem', 'API\BaiVietController@timkiem');
Route::post('upload-image', 'API\UserController@');
