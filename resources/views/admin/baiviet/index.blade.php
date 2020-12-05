@extends('admin.baiviet.sidebar')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>Bài Viết</b></h4>
                            <a href="{{route('baiviet.create')}}" class="btn btn-success">Thêm mới</a>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="bootstrap-table">
                                <table>
                                    <tr class="">
                                        <th> ID</th>
                                        <th  width="50%"> Tiêu Đề</th>
                                        <th>Danh Mục</th>
                                        <th>Mô Tả</th>
                                        <th>Nội Dung</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tiêu Đề Hình Ảnh</th>
                                        <th> Ngày Đăng</th>
                                        <th> Tác giả</th>
                                        <th> Trạng Thái</th>
                                        <th width="70%">Tùy chọn</th>
                                    </tr>

                                    @foreach($baiviets ?? '' as  $baiviet)
                                        <tr>
                                            <td style="text-align:center">{{$baiviet->id}}</td>
                                            <td style="text-align:center">{{$baiviet->TieuDe}}</td>
                                            <td style="text-align:center"> {{$baiviet->DanhMuc}}</td>
                                            <td style="text-align:center"> {{$baiviet->MoTa}}</td>
                                            <td style="text-align:center"> {{$baiviet->NoiDung}}</td>
                                         
                                            <td><img class="img-thumbnail" src="{{asset('image/'.$baiviet->HinhAnh)}}"></td>
                                            <td style="text-align:center">{{$baiviet->TieuDeHinhAnh}}</td>
                                            <td style="text-align:center">{{$baiviet->NgayDang}}</td>
                                            <td style="text-align:center">{{$baiviet->TacGia}}</td>
                                            <td style="text-align:center">{{$baiviet->TrangThai}}</td>
                                            <td>
                                            <form action="{{route('baiviet.destroy', $baiviet->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <a href="{{route('baiviet.edit',$baiviet->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                            </form>
                                    @endforeach
                                </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
