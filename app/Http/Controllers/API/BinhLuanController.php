<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\BinhLuan;
use App\Classes\Helper;
use Auth;

class BinhLuanController extends Controller
{
    public function postBinhLuan(Request $request){
        $binhluan = BinhLuan::create([
            'id_user'  => $request->id_user,
            'name'  =>$request->name,
            'id_baiviet' => $request->id_baiviet,
            'anhdaidien'=>$request->anhdaidien,
            'noidung'     => $request->noidung,
            'trangthai' => 1
        ]);
        if (empty($binhluan)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Đăng thất bại'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Đăng thành công'
        ]);
    }
    public function getBLbyID(Request $request){
        $binhluan = BinhLuan::where('id_user',$request->id_user)->get();
        return response()->json([
    		'data' => $binhluan
    	]);
    }
    public function layBinhLuan(Request $request)
    {
        $binhluan = BinhLuan::where('id_baiviet',$request->id_baiviet)->get();
        return response()->json([
    		'data' => $binhluan
    	]);
    }
}
