<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table='binhluan';
    protected $fillable =[
        'id',
        'id_user',
        'anhdaidien',
        'name',
        'id_baiviet',
        'noidung',
        'trangthai',
        

    ];
    public function hoadon(){
        return $this->belongsTo('App\Models\User', 'id_user','id');
    }
}
