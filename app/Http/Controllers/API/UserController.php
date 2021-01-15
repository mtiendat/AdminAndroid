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


    public function quenmatkhau(Request $request){
           
        $password = Hash::make($request->password);
        $user=User::where('email',$request->email);
        $user->update([
            'password'  =>$password
        ]);
        if(empty($user)){
            return response()->json([
                'status'=>'fail',
                'message'=>'Thất Bại'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Lấy lại mật khẩu thành công'
        ]);

    }
    public function dangNhap(Request $request) {

        $user = User::where('email',$request->email)->get();
        if(empty($user)){
            return response()->json([
                'status' => 'fail',
                'message' => 'Email hoặc password không chính xác!'
            ]);
        }else if($user[0]->trangthai==0){
            return response()->json([
                'status' => 'fail',
                'message' => 'Tài khoản này bị khóa!'
            ]);
        }
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            $hoten = $user[0]->hoten;
            $email = $user[0]->email;
            $user_name = $user[0]->username;
            $anhdaidien = $user[0]->anhdaidien;
            return response()->json([
            'status' => 'success',
            'message' => 'Đăng nhập thành công!',
            'hoten'=>$hoten,
            'email'=>$email,
            'user_name'=>$user_name,
<<<<<<< Updated upstream
            'anhdaidien'=>"http://192.168.42.14:8000/image/".$anhdaidien
=======
            'anhdaidien'=>"http://192.168.42.108:8000/image/".$anhdaidien
>>>>>>> Stashed changes
             ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Email hoặc password không chính xác!'
        ]);

    }
    public function TimKiemUser(Request $request){
        $user = User::where('email',$request->email)->where('trangthai',1)->get();
<<<<<<< Updated upstream
        $user[0]->anhdaidien="http://192.168.42.14:8000/image/".$user[0]->anhdaidien;
=======
        $user[0]->anhdaidien="http://192.168.42.108:8000/image/".$user[0]->anhdaidien;
>>>>>>> Stashed changes
        return response()
        ->json([
    		'data' => $user]);
    }
}
