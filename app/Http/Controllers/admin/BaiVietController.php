<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use Illuminate\Support\Arr;
use Session;

class  BaiVietController extends Controller
{
    //

    public function __construct()
    {
        $this->viewprefix='admin.baiviet.';
        $this->viewnamespace='admin/baviet';
    }
    public function index()
    {
        $baiviets = BaiViet::all();
        return view($this->viewprefix.'index', compact('baiviets'));
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

    public function imageUpload(Request $request){
        if($request->hasFile('HinhAnh')){
            if($request->file('HinhAnh')->isValid()){
                $request->validate(['HinhAnh'=>'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imageName = time().'.'.$request->HinhAnh->extension();
                $request->HinhAnh->move(public_path('image'),$imageName);
                return $imageName;
            }
        }
        return 'x';
    }
    public function store(Request $request)
    {
        //
        $baiviet= new BaiViet;
        $this->validate($request, [
        'TieuDe'=>'required',
        'DanhMuc'=>'required',
        'MoTa'=>'required',
        'NoiDung'=>'required',
        'HinhAnh'=>'required',
        'TieuDeHinhAnh'=>'required',
        'NgayDang'=>'required',
        'TacGia'=>'required',
        'TrangThai'=>'required',
        ]);
        $baiviet->TieuDe=$request->TieuDe;
        $baiviet->DanhMuc=$request->DanhMuc;
        $baiviet->MoTa=$request->MoTa;
        $baiviet->NoiDung=$request->NoiDung;
        $baiviet->TieuDeHinhAnh=$request->TieuDeHinhAnh;
        $baiviet->HinhAnh=$this->imageUpload($request);
        $baiviet->NgayDang=$request->NgayDang;
        $baiviet->TacGia=$request->TacGia;
        $baiviet->LuotXem = 0;
        $baiviet->TrangThai=$request->TrangThai;
        //if(Category::create($request->all()))
        if($baiviet->save())
        {
            Session::flash('message', 'successfully!');
        }
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('baiviet.index');
    }

    public function edit($id)
    {
        $baiviet=BaiViet::find($id);
        return view($this->viewprefix.'edit')->with('baiviet', $baiviet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, BaiViet $baiviet)
    {
        $data=$request->validate([
            'TieuDe'=>'required',
        'DanhMuc'=>'required',
        'MoTa'=>'required',
        'NoiDung'=>'required',
        'HinhAnh'=>'required',
        'TieuDeHinhAnh'=>'required',
        'NgayDang'=>'required',
        'LuotXem'=>'required',
        'TacGia'=>'required',
        'TrangThai'=>'required',
        ]);

        $data['HinhAnh']=$this->imageUpload($request);
        
        //if(Category::create($request->all()))
        if($baiviet->update($data))
        {
            Session::flash('message', 'successfully!');
        }
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('baiviet.index');
    }
    public function destroy(BaiViet $baiviet)
    {
        if($baiviet->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('baiviet.index');
    }
    public function layDanhSach(Request $request)
    {
        $baiviets = BaiViet::where('DanhMuc',$request->danhmuc)->get();
        $dem =count($baiviets);
        for($i=0;$i<$dem;$i++)
         $baiviets[$i]->HinhAnh="http://10.0.2.2:8000/image/".$baiviets[$i]->HinhAnh;
        return response()->json([
    		'data' => $baiviets
    	]);
    }
    public function layBaiVietID(Request $request){
        $baiviets = BaiViet::where('id',$request->id)->get();
        $baiviets[0]->HinhAnh="http://10.0.2.2:8000/image/".$baiviets[0]->HinhAnh;
        
        return response()
        ->json([
    		'data' => $baiviets]);
    }
    public function timkiem(Request $request){
        $tieude = BaiViet::where('TieuDe','like','%'.$request->tukhoa.'%')->get();
        $tieude[0]->HinhAnh="http://10.0.2.2:8000/image/".$tieude[0]->HinhAnh;
      
        return response()
        ->json([
    		'data' => $tieude]);
    }
    public function dsTinDaXem(Request $request){
    
        $id=array();
        for($i=0;$i<$request->size;$i++){
            $s = "id".$i; //vì key truyền lên là:id0,id0,..;
            array_push($id,$request->$s);//$request->s(s là key) lấy ra id truyền lên push vào mảng
            
        }
        $baiviets=BaiViet::whereIn('id', $id)->get(); //truy vấn whereIn: lấy tất cả giá trị thuộc cột id, điều kiện là 1 mang [] id truyền vào
  
        for($i=0;$i<count($baiviets);$i++)
         $baiviets[$i]->HinhAnh="http://10.0.2.2:8000/image/".$baiviets[$i]->HinhAnh;
        return response()->json([
    		'data' => $baiviets
    	]);
       
    }
    
}
