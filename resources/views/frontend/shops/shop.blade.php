@extends('frontend.layouts.master')
@section('title')
    <title>2nds - Cart</title>
@endsection
@section('content')
<div class="container">
    <div class="shop">
        <div class="row">
            <div class="col-3">
                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">DANH MỤC</div>
                        <ul class="sidebar_categories">
                            @foreach($listCat as $cat)
                                @if($cat->parent_id==0)
                                    <li><a href="{{$cat->slug}}">{{$cat->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">LỌC SẢN PHẨM</div>
                        <div class="sidebar_subtitle">Giá</div>
                        <div class="filter_price">
                            <form action="#" method="post" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá từ :</label>
                                    <input name="price_low" type="text" class="form-control" id="" placeholder="Nhập số tiền">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đến :</label>
                                    <input name="price_high" type="text" class="form-control" id="" placeholder="Nhập số tiền">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Màu sắc</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            <li class="brand"><a href="#">Apple</a></li>
                            <li class="brand"><a href="#">Beoplay</a></li>
                            <li class="brand"><a href="#">Google</a></li>
                            <li class="brand"><a href="#">Meizu</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <!-- Shop Content -->
                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="shop_product_grid">
                        <div class="shop_product_grid_border"></div>

                        @foreach($products as $product)
                        <!-- Product Item -->
                            <div class="shop_product_item d-inline-flex">
                                <div class="shop_product_border"></div>
                                <div class="shop_product_image d-flex flex-column align-items-center justify-content-center"><img src="{{$product->image}}" alt="{{$product->name}}"></div>
                                <div class="shop_product_content">
                                    <div class="shop_product_price">{{number_format($product->price)}}</div>
                                    <div class="shop_product_name">
                                        <div><a class="text-info" href="{{route('frontend.product',$product->id)}}">{{$product->name}}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
