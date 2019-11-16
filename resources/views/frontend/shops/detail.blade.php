@extends('frontend.layouts.user_master')
@section('title')
    <title>2nds - Product</title>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="deals col-md-8">

                        @if($product->images)
                        <div class="deals_slider_container">
                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                            @foreach($product->images as $image)
                                <!-- Deals Item -->
                                    <div class="owl-item deals_item">
                                        <div class="deals_image"><img src="{{$image->path}}" alt=""></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="deals_title">
                            <h5 class="colors">Màu:
                                @foreach($product->images as $image)
                                    @if($image->type==1)
                                        <span class="color {{$image->color->name_en}}"></span>
                                    @endif
                                @endforeach
                            </h5>
                        </div>

                        @endif
                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>
                    <div class="details col-md-4">
                        <form action="{{route('frontend.cart_buy')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
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
                            <p class="product-description"></p>
                            <h4 class="price">Giá bán: {{number_format($product->price)}} đ</h4>
                            <p class="vote"><strong>91%</strong> of người mua hài lòng với sản phẩm này <strong>(87 bình chọn)</strong>
                            </p>

                            <div class="action">
                                <a href="#" target="_blank">
                                    <button class="btn btn-warning" type="submit">MUA NGAY</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Đánh giá sản phẩm</button>
            <div id="demo" class="collapse">
                {!! $product->content !!}
            </div>
        </div>
    </div>
@endsection
