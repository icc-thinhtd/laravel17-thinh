<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                <!-- Deals -->
                <div class="deals">
                    <div class="deals_title">Giảm giá trong tuần</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                        @foreach($sales as $sale)
                            <!-- Deals Item -->
                                <div class="owl-item deals_item">
                                    <div class="deals_image"><a href="{{route('frontend.product',$sale->product_id)}}"><img src="{{$sale->product->image}}" alt=""></a></div>
                                    <div class="deals_content">
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_category"><a href="#">{{$sale->product->category->name}}</a></div>
                                            <div class="deals_item_price_a ml-auto">{{number_format($sale->product->price)}} VNĐ</div>
                                        </div>
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_name">{{$sale->product->name}}</div>
                                            <div class=" ml-auto">{{number_format((1-$sale->sale_off*0.01)*$sale->product->price)}} VNĐ</div>
                                        </div>
                                        <div class="available">
                                            <div class="available_line d-flex flex-row justify-content-start">
                                                <div class="available_title">Còn: <span>{{$sale->quantity-$sale->sold}}</span></div>
                                                <div class="sold_title ml-auto">Đã bán: <span>{{$sale->sold}}</span></div>
                                            </div>
                                            <div class="available_bar"><span style="width:{{$sale->sold/$sale->quantity*100}}%"></span></div>
                                        </div>
                                        <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                            <div class="deals_timer_title_container">
                                                <div class="deals_timer_title">Nhanh tay</div>
                                                <div class="deals_timer_subtitle">Ưu đãi kết thúc sau:</div>
                                            </div>
                                            <div class="deals_timer_content ml-auto">
                                                <div class="deals_timer_box clearfix" data-target-time="">
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                        <span>Giờ</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                        <span>Phút</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                        <span>Giây</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Đặc sắc</li>
                                <li>Giảm giá</li>
                                <li>Bán chạy</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                            @foreach($product_view as $product)
                                <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <form action="{{route('frontend.cart_add')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <div class="product_image mx-auto d-block">
                                                    <a href="{{route('frontend.product',$product->id)}}"><img src="{{$product->image}}" alt=""></a>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price discount"><p><del>{{number_format($product->price)}}</del> VNĐ</p>{{number_format($product->price*0.75)}} VNĐ</div>
                                                    <div class="product_name"><div><a href="{{route('frontend.product',$product->id)}}">{{$product->name}}</a></div></div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
    {{--                                                        <input type="radio" checked name="product_color" style="background:#b19c83">--}}
    {{--                                                        <input type="radio" name="product_color" style="background:#000000">--}}
    {{--                                                        <input type="radio" name="product_color" style="background:#999999">--}}
                                                        </div>
                                                        <button type="submit" class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">
                            @foreach($product_price_down as $product)
                                <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <a href="{{route('frontend.product',$product->id)}}"><img src="{{$product->image}}" alt=""></a></div>
                                            <div class="product_content">
                                                <div class="product_price discount"><p><del>{{number_format($product->price)}}</del> VNĐ</p>{{number_format($product->price*0.75)}} VNĐ</div>
                                                <div class="product_name"><div><a href="{{route('frontend.product',$sale->id)}}">{{$product->name}}</a></div></div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">

                            @foreach($product_best_sold as $product)
                                <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{route('frontend.product',$product->id)}}"><img src="{{$product->image}}" alt=""></a></div>
                                            <div class="product_content">
                                                <div class="product_price discount"><p><del>{{number_format($product->price)}}</del> VNĐ</p>{{number_format($product->price*0.75)}} VNĐ</div>
                                                <div class="product_name"><div><a href="{{route('frontend.product',$product->id)}}">{{$product->name}}</a></div></div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
