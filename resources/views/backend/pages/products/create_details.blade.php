@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('backend.product.index')}}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header bg-cyan">
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('backend.product.store') }}" method="post"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input name="name" type="text" class="form-control" id="" placeholder="Điền tên sản phẩm ">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn danh mục---</option>
                                    <option value="1">Điện thoại</option>
                                    <option value="2">Máy tính</option>
                                    <option value="3">Máy ảnh</option>
                                    <option value="4">Phụ kiện</option>
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ 'Chưa chọn danh mục' }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input name="intro" type="text" class="form-control" placeholder="Nhập tiêu đề sản phẩm">
                                @error('intro')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input name="price" type="text" class="form-control" placeholder="Nhập giá sản phẩm">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Khuyến mại - Giảm giá</label>
                                <select name="price_status" class="form-control select2" style="width: 100%;">
                                    <option value="0">Giá gốc</option>
                                    <option value="1">Giảm giá</option>
                                    <option value="2">Khuyến mãi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea name="content" class="textarea" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Trạng thái bán</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="1">Đang nhập</option>
                                    <option value="2">Mở bán</option>
                                    <option value="3">Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
