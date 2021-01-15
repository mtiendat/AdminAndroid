@extends('admin.baiviet.sidebar')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <form action="{{route('baiviet.store')}}" method="POST"enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Tiêu Đề</label>
                                        <input type="text" class="form-control" name="TieuDe" placeholder="Tiêu Đề" >
                                    </div>
                                </div>
    
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Danh Mục </label>
                                        <input type="text" class="form-control" name="DanhMuc" placeholder="Danh Mục" >
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô Tả</label>
                                        <textarea name="MoTa" class="form-control" placeholder="Mô Tả"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội Dung</label>
                                        <textarea name="NoiDung" class="form-control" placeholder="NoiDung"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                <div class="custom-file">
                                    <label for="exampleInputEmail1">Hình Ảnh</label>
                                    <input type="file" name="HinhAnh" id="ful" class="custom-file-input" />
                                </div>
                                <div class="form-group">
                                    <img id="imgPre" src="{{asset('image/noimage.jpg')}}" alt="no img" class="img-thumbnail" />
                                    <p>
                                    <label class="custom-file-label" for="ful"><i><u><b>Choose File</b></u></i></label>
                                    </p>
                                </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu Đề Hình Ảnh</label>
                                        <input type="text" name="TieuDeHinhAnh" class="form-control" placeholder="TieuDeHinhAnh">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày Đăng</label>
                                        <input type="text" name="NgayDang" class="form-control" placeholder="Ngày Đăng">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tác Giả</label>
                                        <input type="text" name="TacGia" class="form-control" placeholder="Tác Giả">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng Thái</label>
                                        <input type="text" name="TrangThai" class="form-control" placeholder="Trạng thái">
                                
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-info btn-fill pull-right">Thêm</button>
                    {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>


    @stop
