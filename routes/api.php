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
Route::get('chitiet','admin\BaiVietController@layBaiVietID');
Route::post('tin-da-xem','admin\BaiVietController@dsTinDaXem');
Route::get('binhluan','API\BinhLuanController@layBinhLuan');
Route::get('binhluanbyid','API\BinhLuanController@getBLbyID');
Route::post('dang-ky', 'API\UserController@dangKy');
Route::post('dang-binhluan', 'API\BinhLuanController@postBinhLuan');
Route::post('dang-nhap', 'API\UserController@dangNhap');
Route::post('quenmatkhau','API\UserController@quenmatkhau');
Route::get('timkiem', 'admin\BaiVietController@timkiem');
Route::post('upload-image', 'API\UserController@');
