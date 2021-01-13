<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaiViet;
class BaiVietController extends Controller
{
    //
    public function layDanhSach(Request $request)
    {
        $baiviets = BaiViet::where('DanhMuc',$request->danhmuc)->where('trangthai',1)->orderBy('id','desc')->get();
        $dem =count($baiviets);
        for($i=0;$i<$dem;$i++)
         $baiviets[$i]->HinhAnh="http://10.0.2.2:8000/image/".$baiviets[$i]->HinhAnh;
        return response()->json([
    		'data' => $baiviets
    	]);
    }
    public function layBaiVietID(Request $request){
        $baiviets = BaiViet::find($request->id);
        $baiviets->update([
          'LuotXem'  =>$baiviets->LuotXem+1
        ]);
        $baiviets->HinhAnh="http://10.0.2.2:8000/image/".$baiviets->HinhAnh;
        return response()
        ->json([
    		'data' => $baiviets]);
    }
    public function timkiem(Request $request){
        $tieude = BaiViet::where('TieuDe','like','%'.$request->tukhoa.'%')->where('trangthai',1)->get();
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
