<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::resource('baiviet',admin\BaiVietController::class);
Route::resource('danhmuc',admin\DanhMucController::class);
Route::resource('user',admin\UserController::class);
Route::resource('binhluan',admin\BinhLuanController::class);




/*
GET	    /product	        		index	product.index
GET	    /product/create	    		create	product.create
POST	/product					store	product.store
GET		/product/{product}			show	product.show
GET		/product/{product}/edit		edit	product.edit
PUT/PATCH	/product/{product}		update	product.update
DELETE	/ product/{product}			destroy	product.destroy
*/
