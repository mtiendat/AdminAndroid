@extends('admin.baiviet.sidebar')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <form action="{{route('baiviet.update',$baiviet->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                            <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Tiêu Đề</label>
                                        <input type="text" class="form-control" name="TieuDe" value="{{$baiviet->TieuDe}}" >
                                    </div>
                                </div>
    
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Danh Mục </label>
                                        <input type="text" class="form-control" name="DanhMuc" value="{{$baiviet->DanhMuc}}" />
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô Tả</label>
                                        <textarea name="Gia" class="form-control" value="{{$baiviet->MoTa}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội Dung</label>
                                        <textarea name="NoiDung" class="form-control" value="{{$baiviet->NoiDung}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                <div class="custom-file">
                                    <label for="exampleInputEmail1">Hình Ảnh</label>
                                    <input type="file" name="HinhAnh" id="ful" class="custom-file-input" />
                                </div>
                                <div class="form-group">
                                    <img id="imgPre" src="{{asset('image/'.$baiviet->HinhAnh)}}" alt="no img" class="img-thumbnail" />
                                    <p>
                                    <label class="custom-file-label" for="ful"><i><u><b>Choose File</b></u></i></label>
                                    </p>
                                </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu Đề Hình Ảnh</label>
                                        <input type="text" name="TieuDeHinhAnh" class="form-control" value="{{$baiviet->TieuDeHinhAnh}}">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày Đăng</label>
                                        <input type="text" name="NgayDang" class="form-control" value="{{$baiviet->NgayDang}}">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tác Giả</label>
                                        <input type="text" name="TacGia" class="form-control" value="{{$baiviet->TacGia}}">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng Thái</label>
                                        <input type="text" name="TrangThai" class="form-control" value="{{$baiviet->TrangThai}}">
                                        <input type="text" hidden name="LuotXem" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@stop
