@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ảnh sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('backend.product.index')}}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('backend.product.edit',$product->id)}}">{{$product->name}}</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<!-- Single Product -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h5 class="colors">Màu:
                    @foreach($product->images as $image)
                        @if($image->type==1)
                            <a href="{{route('backend.product.show',$product->id)}}?color={{$image->color->id}}" class="color {{$image->color->name_en}}"></a>
                        @endif
                    @endforeach
                    <a class="btn btn-info" href="{{route('backend.product.image',$product->id)}}">Thêm màu</a>
                </h5>

                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        @foreach($images as $key => $image)
                            <li data-target="#demo" data-slide-to="{{$key}}" class="@if($key==0) active @endif"></li>
                        @endforeach
                    </ul>
                    <div class="carousel-inner">
                        @foreach($images as $key => $image)
                            <div class="carousel-item @if($image->type) active @endif">
                                <img class="mx-auto d-block" src="{{$image->path}}" alt="#" height="450">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="details col-sm-4">
                <h3 class="product-title">{{$product->name}}</h3>
                <p>{{$product->intro}}</p>
                <div class="rating">
                    <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                    </div> <span class="review-no">123 đánh giá</span>
                </div>
                <div style="border: 1px solid grey;">
                    <h5 style="width: 100%; color: #0d82d3; padding: 10px;">Khuyến mãi</h5>
                    <ul style="width: 100%; color: #0d82d3; padding: 10px;">
                        <li>* Giảm thêm 3% cho khách mua online có sinh nhật trong tháng 11</li>
                        <li>* Phiếu mua hàng trị giá 1 triệu</li>
                        <li>* Không áp dụng khi mua trả góp 0%</li>
                    </ul>
                </div>
                <h4 class="price">Giá bán: {{number_format($product->price)}} đ</h4>
            </div>
            <div style="width: 100%; margin-top: 20px;">
                <hr>
                {!! $product->content !!}
            </div>
        </div>
    </div>
@endsection
