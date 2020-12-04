<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

use Session;

class DanhMucController extends Controller
{
    //

    public function __construct()
    {
        $this->viewprefix='admin.danhmuc.';
        $this->viewnamespace='admin/danhmuc';
    }
    public function index()
    {
        $danhmucs = DanhMuc::all();
        return view($this->viewprefix.'index', compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
   **/

    public function create()
    {
        //
        return view($this->viewprefix.'create');
    }

    public function store(Request $request)
    {
        //
        $danhmuc= new DanhMuc();
        $this->validate($request, [
            'TenDanhMuc'=>'required',
            'TrangThai' => 'required',
           
        ]);
        $danhmuc->TenDanhMuc=$request->TenDanhMuc;
        $danhmuc->TrangThai=$request->TrangThai;
        
        //if(Category::create($request->all()))
        if($danhmuc->save())
        {
            Session::flash('message', 'successfully!');
        }
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('danhmuc.index');
    }

    public function edit(DanhMuc $danhmuc)
    {
        return view($this->viewprefix.'edit')->with('danhmuc', $danhmuc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DanhMuc  
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, DanhMuc $danhmuc)
    {
        $data=$request->validate([
            
            'TenDanhMuc' => 'required',
            'TrangThai' => 'required',
           
        ]);    
        
     
        
        //if(Category::create($request->all()))
        if($danhmuc->update($data))
        {
            Session::flash('message', 'successfully!');
        }
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('danhmuc.index');
    }
    public function destroy(DanhMuc $danhmuc)
    {
        if($danhmuc->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('danhmuc.index');
    }
   
    
    
}
