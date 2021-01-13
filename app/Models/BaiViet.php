<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    protected $table='baiviet';
    protected $fillable = [
        'TieuDe',
        'DanhMuc',
        'MoTa',
        'NoiDung',
        'HinhAnh',
        'TieuDeHinhAnh',
        'NgayDang',
        'TacGia',
        'LuotXem',
        'TrangThai',
    ];

}
