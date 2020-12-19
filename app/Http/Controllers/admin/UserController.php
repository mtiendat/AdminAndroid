<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
class UserController extends Controller
{
    public function __construct()
    {
        $this->viewprefix='admin.user.';
        $this->viewnamespace='admin/user';
    }
    public function index()
    {
        $user = User::all();
        return view($this->viewprefix.'index', compact('user'));
    }

     public function create()
     {
         //
         return view($this->viewprefix.'create');
     }

     public function store(Request $request)
     {

         $user= new User;
        $this->validate($request, [
            'txtname' => 'required',
            'txtpassword' => 'required',
            'txthoten' => 'required',
            'txtdiachi' => 'required',
            'txtemail' => 'required',
            'txtsdt' => 'required',
            'txtloai' => 'required',
            'txttrangthai' => 'required'

        ]);
        $user->name = $request->txtname;
        $user->password = Hash::make($request->txtpassword);
        $user->hoten = $request->txthoten;
        $user->diachi = $request->txtdiachi;
        $user->email = $request->txtemail;
        $user->sdt = $request->txtsdt;
        $user->loai = $request->txtloai;
        $user->trangthai = $request->txttrangthai;
         //if(Category::create($request->all()))
         if($user->save())
         {
             Session::flash('message', 'successfully!');
         }
         else
             Session::flash('message', 'Failure!');
         return redirect()->route('user.index');
    }
    public function edit(User $user)
    {
        return view($this->viewprefix.'edit')->with('user', $user);
    }

    public function show(User $user)
    {
        //
    }
    public function update(Request $request, User $user)
    {
        $data=$request->validate([
            'txtname' => 'required',
            'txtpassword' => 'required',
            'txthoten' => 'required',
            'txtdiachi' => 'required',
            'txtemail' => 'required',
            'txtsdt' => 'required',
            'txtloai' => 'required',
            'txttrangthai' => 'required'
        ]);
        $user->name = $request->txtname;
        $user->password = Hash::make($request->txtpassword);
        $user->hoten = $request->txthoten;
        $user->diachi = $request->txtdiachi;
        $user->email = $request->txtemail;
        $user->sdt = $request->txtsdt;
        $user->loai = $request->txtloai;
        $user->trangthai = $request->txttrangthai;
        if($user->update($data))
        {
            Session::flash('message', 'successfully!');
        }
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('user.index');
    }
    public function destroy(User $user)
    {
        if($user->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('user.index');
    }



    public function LayDanhSach(Request $request){
        $users = User::where('username',$request->username)->get();
        return response()->json([
    		'data' =>$users
    	]);
        }
}
