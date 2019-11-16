@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <a class="btn btn-info" href="{{route('backend.product.show',$product->id)}}">Ảnh sản phẩm</a>
                </ol>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('backend.product.show',$product->id)}}">Ảnh sản phẩm</a></li>
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
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Thông tin sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('backend.product.update',$product->id) }}" method="post"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input name="name" type="text" value="{{$product->name}}" class="form-control" id="" placeholder="Điền tên sản phẩm ">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="1" @if($product->parent_id == 1) selected @endif>Điện thoại</option>
                                    <option value="2" @if($product->parent_id == 2) selected @endif>Máy Tính</option>
                                    <option value="3" @if($product->parent_id == 3) selected @endif>Máy ảnh</option>
                                    <option value="4" @if($product->parent_id == 4) selected @endif>Phụ kiện</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input name="intro" value="{{$product->intro}}" type="text" class="form-control" placeholder="Nhập tiêu đề sản phẩm">
                                @error('intro')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input name="price" value="{{$product->price}}" type="text" class="form-control" placeholder="Nhập giá sản phẩm">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Khuyến mại - Giảm giá</label>
                                <select name="price_status" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if($product->price_status == 0) selected @endif>Giữ giá</option>
                                    <option value="1" @if($product->price_status == 1) selected @endif>Giảm giá</option>
                                    <option value="2" @if($product->price_status == 2) selected @endif>Khuyến mại</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea name="content" class="textarea" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Trạng thái bán</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if($product->status == 0) selected @endif>Đang nhập</option>
                                    <option value="1" @if($product->status == 1) selected @endif>Mở bán</option>
                                    <option value="2" @if($product->status == 2) selected @endif>Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{route('backend.product.index')}}" class="btn btn-default">Trở lại</a>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
