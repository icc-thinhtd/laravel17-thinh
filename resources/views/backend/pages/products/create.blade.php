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
        <div class="group-tabs">
            <!-- Nav tabs -->

            <ul class="nav nav-pills d-flex" role="tablist">
                <li role="presentation" class="active flex-fill"><a style="width: 100%;" class="btn btn-success" href="#create" aria-controls="home" role="tab" data-toggle="tab">Thông tin cơ bản</a></li>
                <li role="presentation" class="flex-fill"><a style="width: 100%;" class="btn btn-warning" href="#details" aria-controls="profile" role="tab" data-toggle="tab">Chi tiết</a></li>
                <li role="presentation" class="flex-fill"><a style="width: 100%;" class="btn btn-danger" href="#images" aria-controls="messages" role="tab" data-toggle="tab">Hình ảnh</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane @if($page==1) active @endif" id="create">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông tin cơ bản</h3>

                                    @if(session()->has('status'))
                                        <h5 style="color: green">{{session()->get('status')}}</h5>
                                    @endif
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @if($product)
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
                                @else
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
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: @if(!$product) none @endif" role="tabpanel" class="tab-pane @if($page==2) active @endif"  id="details">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card">
                                <div class="card-header">
                                    <h3>Chi tiết sản phẩm</h3>
                                    @if(session()->has('status'))
                                        <h5 style="color: green">{{session()->get('status')}}</h5>
                                    @endif
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @if($detail_product)
                                    <form action="{{ route('backend.product.detail_update') }}" method="post"  role="form">
                                        @csrf
                                        <div class="card-body">
                                            <input name="product_id" type="hidden" value="{{$detail_product->product_id}}">
                                            <div class="form-group">
                                                <label for="cpu">CPU</label>
                                                <input name="cpu" type="text" class="form-control" id="cpu" value="{{$detail_product->cpu}}" placeholder="vi xủ lý">
                                            </div>
                                            <div class="form-group">
                                                <label for="ram">RAM</label>
                                                <input name="ram" type="text" class="form-control" id="ram" value="{{$detail_product->ram}}" placeholder="bộ nhớ ram">
                                            </div>
                                            <div class="form-group">
                                                <label for="screen">SCREEN</label>
                                                <input name="screen" type="text" class="form-control" id="screen" value="{{$detail_product->screen}}" placeholder="kích thước màn hình">
                                            </div>
                                            <div class="form-group">
                                                <label for="vga">VGA</label>
                                                <input name="vga" type="text" class="form-control" id="vga" value="{{$detail_product->vga}}" placeholder="card màn hình">
                                            </div>
                                            <div class="form-group">
                                                <label for="storage">STORAGE</label>
                                                <input name="storage" type="text" class="form-control" id="storage" value="{{$detail_product->storage}}" placeholder="bộ nhớ trong">
                                            </div>
                                            <div class="form-group">
                                                <label for="extent_memory">EXTENT MEMORY</label>
                                                <input name="extent_memory" type="text" class="form-control" id="extent_memory" value="{{$detail_product->extent_memory}}" placeholder="bộ nhớ ngoài">
                                            </div>
                                            <div class="form-group">
                                                <label for="cam1">CAM1</label>
                                                <input name="cam1" type="text" class="form-control" id="cam1" value="{{$detail_product->cam1}}" placeholder="camera chính">
                                            </div>
                                            <div class="form-group">
                                                <label for="cam2">CAM2</label>
                                                <input name="cam2" type="text" class="form-control" id="cam2" value="{{$detail_product->cam2}}" placeholder="camera phụ">
                                            </div>
                                            <div class="form-group">
                                                <label for="sim">SIM</label>
                                                <input name="sim" type="text" class="form-control" id="sim" value="{{$detail_product->sim}}" placeholder="thông tin sim">
                                            </div>

                                            <div class="form-group">
                                                <label for="connect">CONNECT</label>
                                                <input name="connect" type="text" class="form-control" id="connect" value="{{$detail_product->connect}}" placeholder="thông tin kết nối">
                                            </div>
                                            <div class="form-group">
                                                <label for="pin">PIN</label>
                                                <input name="pin" type="text" class="form-control" id="pin" value="{{$detail_product->pin}}" placeholder="pin">
                                            </div>
                                            <div class="form-group">
                                                <label for="os">OS</label>
                                                <input name="os" type="text" class="form-control" id="os" value="{{$detail_product->os}}" placeholder="hệ điều hành">
                                            </div>

                                            <div class="form-group">
                                                <label for="note">NOTE</label>
                                                <input name="note" type="text" class="form-control" id="note" value="{{$detail_product->note}}" placeholder="chú ý">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('backend.product.detail_store') }}" method="post"  role="form">
                                        @csrf
                                        <div class="card-body">
                                            <input name="product_id" type="hidden" value="@if($product) {{$product->id}} @endif">
                                            <div class="form-group">
                                                <label for="cpu">CPU</label>
                                                <input name="cpu" type="text" class="form-control" id="cpu" placeholder="vi xủ lý">
                                            </div>
                                            <div class="form-group">
                                                <label for="ram">RAM</label>
                                                <input name="ram" type="text" class="form-control" id="ram" placeholder="bộ nhớ ram">
                                            </div>
                                            <div class="form-group">
                                                <label for="screen">SCREEN</label>
                                                <input name="screen" type="text" class="form-control" id="screen" placeholder="kích thước màn hình">
                                            </div>
                                            <div class="form-group">
                                                <label for="vga">VGA</label>
                                                <input name="vga" type="text" class="form-control" id="vga" placeholder="card màn hình">
                                            </div>
                                            <div class="form-group">
                                                <label for="storage">STORAGE</label>
                                                <input name="storage" type="text" class="form-control" id="storage" placeholder="bộ nhớ trong">
                                            </div>
                                            <div class="form-group">
                                                <label for="extent_memory">EXTENT MEMORY</label>
                                                <input name="extent_memory" type="text" class="form-control" id="extent_memory" placeholder="bộ nhớ ngoài">
                                            </div>
                                            <div class="form-group">
                                                <label for="cam1">CAM1</label>
                                                <input name="cam1" type="text" class="form-control" id="cam1" placeholder="camera chính">
                                            </div>
                                            <div class="form-group">
                                                <label for="cam2">CAM2</label>
                                                <input name="cam2" type="text" class="form-control" id="cam2" placeholder="camera phụ">
                                            </div>
                                            <div class="form-group">
                                                <label for="sim">SIM</label>
                                                <input name="sim" type="text" class="form-control" id="sim" placeholder="thông tin sim">
                                            </div>

                                            <div class="form-group">
                                                <label for="connect">CONNECT</label>
                                                <input name="connect" type="text" class="form-control" id="connect" placeholder="thông tin kết nối">
                                            </div>
                                            <div class="form-group">
                                                <label for="pin">PIN</label>
                                                <input name="pin" type="text" class="form-control" id="pin" placeholder="pin">
                                            </div>
                                            <div class="form-group">
                                                <label for="os">OS</label>
                                                <input name="os" type="text" class="form-control" id="os" placeholder="hệ điều hành">
                                            </div>

                                            <div class="form-group">
                                                <label for="note">NOTE</label>
                                                <input name="note" type="text" class="form-control" id="note" placeholder="chú ý">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">Lưu</button>
                                        </div>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: @if(!$product) none @endif" role="tabpanel" class="tab-pane  @if($page==3) active @endif" id="images">
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

                                @if($image_product)
                                    <form action="{{ route('backend.product.image_update') }}" method="post"  role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div style="height: 300px; border: 1px solid grey;">
                                                        <img id="main_image" class="mx-auto d-block" src="{{$product->image}}" style="height: 90%; margin: 5px;" alt="sửa ảnh">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Màu sản phẩm</label>
                                                        <select name="color_id" class="form-control select2" style="width: 100%;">
{{--                                                            @foreach($product->images as $images)--}}
{{--                                                                @if($images->type)--}}
{{--                                                                    <option value="{{$images->color->id}}">{{$images->color->name_vn}}</option>--}}
{{--                                                                @endif--}}
{{--                                                            @endforeach--}}
                                                            <option value="1">Đen</option>
                                                            <option value="2">Trắng</option>
                                                            <option value="3">Đỏ</option>
                                                            <option value="4">Vàng</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Ảnh sản phẩm chính</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="in_img" name="image_main">
                                                                <label class="custom-file-label" for="in_img">Chọn 1 ảnh</label>
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
                                                        <input type="file" class="custom-file-input" id="in_images" name="image_details[]" multiple>
                                                        <label class="custom-file-label" for="in_images">Chọn nhiều ảnh</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                @foreach($product->images as $images)
                                                    @if(!$images->type)
                                                        <div class="card d-inline-flex" style="width:200px">
                                                            <img class="card-img-top" src="{{$images->path}}" alt="Card image">
                                                            <div class="card-body">
                                                                <form style="display: inline-block;" action="{{route('backend.product.image_delete',$images->id)}}" method="post" accept-charset="utf-8">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </form>
                                @else
                                <form action="{{ route('backend.product.image_store') }}" method="post"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <input name="product_id" type="hidden" value="@if($product) {{$product->id}} @endif">
                                        <div class="row">
                                            <div class="col-6">
                                                <div style="height: 300px; border: 1px solid grey;">
                                                    <img id="main_image" src="" alt="ảnh mới">
                                                </div>
                                            </div>
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
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Ảnh sản phẩm chính</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="in_img" name="image_main">
                                                            <label class="custom-file-label" for="in_img">Chọn 1 ảnh</label>
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
                                                    <input type="file" class="custom-file-input" id="in_images" name="image_details[]" multiple>
                                                    <label class="custom-file-label" for="in_images">Chọn nhiều ảnh</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Main row -->
        </div>
    </div>
@endsection

