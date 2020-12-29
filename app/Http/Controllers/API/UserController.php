<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Classes\Helper;
use Auth;

class UserController extends Controller
{
    public function dangKy(Request $request) {
        
        $password=Hash::make($request->password);
        $avatar=Helper::imageUpload($request);
        $user = User::create([
            'username'  => $request->username,
            'password'  =>$password,
            'anhdaidien' => $avatar,
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
            $email = $user[0]->email;
            return response()->json([
            'status' => 'success',
            'message' => 'Đăng nhập thành công!',
            'hoten'=>$hoten,
            'email'=>$email
             ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Email hoặc password không chính xác!'
        ]);

    }
}
