<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="/assets/frontend/images/phone.png" alt=""></div>{{isset($user['phone'])?$user['phone']:'0963.980.840'}}</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="/assets/frontend/images/mail.png" alt=""></div><a href="mailto: tr.thinh92@gmail.com">{{isset($user['email'])?$user['email']:'2nds@gmail.com'}}</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">Vietnamese</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="/assets/frontend/images/user.svg" alt=""></div>


                            <div>
                                <!-- Authentication Links -->
                                @guest
                                    <div>
                                        <a href="{{route('login')}}">Đăng nhập</a>
                                    </div>
                                    <span> | </span>
                                    @if (Route::has('register'))
                                        <div>
                                            <a href="{{route('register')}}">Đăng ký</a>
                                        </div>
                                    @endif
                                @else
                                    <div>
                                        <a href="{{route('home')}}">{{ Auth::user()->name }}</a>
                                        <span> | </span>
                                        <a class="text-info" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endguest
                            </div>
                            <ul class="navbar-nav ml-auto">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-3">
                    <div class="logo_container">
                        <div class="logo"><a href="{{route('2nds')}}"><img src="/images/logo.png"  alt="logo"></a><span style="font-size: 1.5em; color: #106797;">Shop</span></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-10 col-9">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="#" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input" placeholder="Tìm kiếm sản phẩm...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">Danh mục</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                <li><a class="clc" href="#">Tất cả</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="/assets/frontend/images/search.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">
                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">Danh mục</div>
                            </div>
                            <ul class="cat_menu">
                                @foreach($listCat as $key => $cate)
                                    @if($cate->parent_id==0)
                                        <li class="hassubs">
                                            <a href="/danh-muc/{{$cate->slug}}">{{$cate->name}}<i class="clc"></i></a>
                                            <ul>
                                                @foreach($listCat as $cat)
                                                    @if($cat->parent_id==$cate->id)
                                                        <a href="{{$cat->slug}}">{{$cat->name}}<i class="clc"></i></a>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="{{route('2nds')}}" >Trang chủ<i class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
                                    <a href="#">Giảm giá<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="#">Điện thoại<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Apple<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Samsung<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Oppo<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Máy tính<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Máy ảnh<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Phụ kiện<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="hassubs">
                                    <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{route('2nds')}}">Shop<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{route('frontend.product',1)}}">Product<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Cart<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{route('frontend.contact')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('frontend.blog')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{route('frontend.contact')}}"> Liên hệ<i class="fas fa-chevron-down"></i></a></li>
                                <li>
                                    <div class="cart">
                                        <div class="d-flex flex-row align-items-center justify-content-end">
                                            <div class="cart_icon">
                                                <img src="/assets/frontend/images/cart.png" alt="">
                                                <div class="cart_count"><span>{{$cart_count}}</span></div>
                                            </div>
                                            <div class="cart_content">
                                                <div class="cart_text"><a href="{{route('frontend.cart')}}">Giỏ hàng</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input" placeholder="Tìm sản phẩm...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item">
                                <a href="#">Trang chủ<i class="fa fa-angle-down"></i></a>
                            </li>

                            <li class="page_menu_item has-children">
                                <a href="#">SẢN PHẨM<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Xem nhiều<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Bán chạy<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Giảm giá<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item"><a href="#">blog<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item"><a href="#">Liên hệ<i class="fa fa-angle-down"></i></a></li>
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="/assets/frontend/images/phone_white.png" alt=""></div>{{isset($user['phone'])?$user['phone']:'0963.980.840'}}</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="/assets/frontend/images/mail_white.png" alt=""></div><a href="mailto: tr.thinh92@gmail.com">{{isset($user['email'])?$user['email']:'2nds@gmail.com'}}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
