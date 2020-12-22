<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function dangKy(Request $request) {
        $password=Hash::make($request->password);
        $user = User::create([
            'username'  => $request->username,
            'password'  =>$password,
            'hoten'     => $request->hoten,
            'diachi'    => $request->diachi,
            'sdt'       => $request->sdt,
            'email'     => $request->email,
            'trangthai' => 1
        ]);
        if (empty($user)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Đăng ký thất bại'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Đăng ký thành công'
        ]);
    }

    public function dangNhap(Request $request) {
        
        $user = User::where('email',$request->email)->get();
        if(empty($user)){
            return response()->json([
                'status' => 'fail',
                'message' => 'Email hoặc password không chính xác!'
            ]);
        }
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            $hoten = $user[0]->hoten;
            return response()->json([
            'status' => 'success',
            'message' => 'Đăng nhập thành công!',
            'hoten'=>$hoten,
             ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Email hoặc password không chính xác!'
        ]);

    }
}
