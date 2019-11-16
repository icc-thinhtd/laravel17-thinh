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
                    <div class="card-header">
                        <h3>Hình ảnh sản phẩm</h3>
                        @if(session()->has('status'))
                            <h5 style="color: green">{{session()->get('status')}}</h5>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('backend.product.image_store') }}" method="post"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="product_id" value="{{$product_id}}">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Màu sản phẩm</label>
                                        <select name="color_id" class="form-control select2" style="width: 100%;">
                                            <option value="1">Đen</option>
                                            <option value="2">Trắng</option>
                                            <option value="3">Đỏ</option>
                                            <option value="4">Vàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh sản phẩm chính</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image_main">
                                                <label class="custom-file-label" for="exampleInputFile">Chọn 1 ảnh</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh chi tiết</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image_details[]" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Chọn nhiều ảnh</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default" href="{{route('backend.product.index')}}">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tiếp tục</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
