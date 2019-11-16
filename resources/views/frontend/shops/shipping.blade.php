
@extends('frontend.layouts.master')
@section('title')
    <title>2nds - Cart</title>
@endsection
@section('content')
    <div class="container">
        <div class="wrap">
            <div class="container">
                <h3 class="step-title lg-m-top-15">1. Khách hàng mới / Đăng nhập</h3>
                <p class="text-center">Thanh toán đơn hàng trong chỉ một bước với:</p>
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="btn btn-info" title="Đăng nhập bằng Facebook" href="#" >
                            <i class="fa fa-facebook"></i>
                            <span>Đăng nhập bằng Facebook</span>
                        </a>
                    </li>
                    <li>Hoặc</li>
                    <li class="nav-item">
                        <a class="btn btn-warning" title="Đăng nhập bằng Google" href="#">
                            <span class="icon"><i class="ico ico-google"></i></span>
                            <span>Đăng nhập bằng Google</span>
                        </a>
                    </li>
                    <li>Hoặc</li>
                    <li class="nav-item">
                        <a class="btn btn-success" title="Đăng nhập bằng Zalo" href="#">
                            <img src="#" class="icon">
                            <span class="text">Đăng nhập bằng Zalo</span>
                        </a>
                    </li>
                </ul>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-xs-12 col-sm-8 pad-right-0">
                        <!-- Nav pills -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#login" alt="login-form">
                                    <span style="color: black;font-size: 20px;">Đăng nhập</span>
                                    <i>(Đã là thành viên 2nds)</i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#register" alt="register-form">
                                    <span style="color: black;font-size: 20px;">Tạo tài khoản</span>
                                    <i>(Dành cho khách hàng mới)</i>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="border:1px solid #ddd;">
                            <div class="tab-pane container active" id="login">
                                <div id="login-form" style="display: block; padding-top: 20px;">
                                    <form method="POST" action="{{route('frontend.checkout.login')}}">
                                        @csrf
                                        <input type="hidden" name="checkout_step" value="1">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Nhập Email">
                                        </div>

                                        <div class="form-group has-feedback" id="popup_password">
                                            <label class="control-label">Mật khẩu</label>
                                            <input type="password" id="login_password" class="form-control login" name="password" placeholder="Nhập mật khẩu" autocomplete="off" data-bv-field="password">
                                        </div>

                                        <div class="login-ajax-captcha" style="display:none">
                                            <div id="login-checkout-recaptcha"></div>
                                            <span class="help-block ajax-message"></span>
                                        </div>
                                        <div class="form-group" id="error_captcha" style="margin-bottom: 15px">
                                            <span class="help-block ajax-message"></span>
                                        </div>

                                        <div class="form-group last">
                                            <p class="reset">Quên mật khẩu? Khôi phục mật khẩu <a data-toggle="modal" data-target="#reset-password-form" href="#">tại đây</a></p>
                                            <button type="submit" id="login_popup_submit" class="btn btn-info btn-block">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="register" style="padding-top: 20px;">
                                <div id="register-form" class="register-comm-for">
                                    <form action="{{ route('backend.user.store') }}" method="post"  role="form">
                                        @csrf
                                        <input type="hidden" name="verify" value="1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input name="phone" class="form-control" id="" placeholder="Nhập số điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input name="email" type="email" class="form-control" id="" placeholder="Nhập email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input name="password" type="password" class="form-control"  placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên</label>
                                            <input name="name" type="text" class="form-control" id="" placeholder="Tên người dùng">
                                        </div>

                                        <div>
                                            <p class="policy">Khi bạn nhấn Đăng ký, bạn  đã đồng ý thực hiện mọi giao dịch mua bán theo <a href="#">điều kiện sử dụng và chính sách của 2nds</a>.</p>
                                            <div class="form-group last">
                                                <button type="submit" id="register_popup_submit" class="btn btn-info btn-block">Đăng ký</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div id="panel-cart">
                            <div class="panel panel-default">
                                <div class="panel-body" style="border: 1px solid #ddd; padding: 10px;">
                                    <div class="order">
                                        <span style="font-size: 20px;">Đơn Hàng</span>
                                        <span class="title">( {{count($carts)}} sản phẩm )</span>

                                        <a href="https://tiki.vn/checkout/cart/" class="btn btn-default btn-custom1">Sửa</a>
                                    </div>
                                    <div class="product">
                                        <table class="table">
                                            <tr>
                                                <td>Tên sản phẩm</td>
                                                <td>Số lượng</td>
                                                <td>Số tiền</td>
                                            </tr>
                                            @foreach($carts as $cart)
                                                <tr>
                                                    <td>{{$cart->name}}</td>
                                                    <td>{{$cart->qty}}</td>
                                                    <td>{{number_format($cart->price*$cart->qty)}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div>
                                        <hr>
                                        <p style="color: black;">
                                            Thành tiền:
                                            <span style="color: red; font-size: 20px; float: right;">{{number_format($total)}}</span>
                                        </p>
                                        <p class="text-right">
                                            <i>(Đã bao gồm VAT nếu có)</i>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
    </div>
@endsection
