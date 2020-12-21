<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function dangKy(Request $request) {
        $user = User::create([
            'username'  => $request->username,
            'hoten'     => $request->hoten,
            'password'  => md5($request->password),
            'diachi'    => $request->diachi,
            'sdt'       => $request->sdt,
            'email'     => $request->email,
            'trangthai' => 1
        ]);
        if (empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Đăng ký thất bại'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công'
        ]);
    }

    public function test() {
        return response()->json([
            'message' => 'test api'
        ]);
    }
}
