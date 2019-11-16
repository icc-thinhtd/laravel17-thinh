
@extends('frontend.layouts.master')
@section('title')
    <title>2nds - Cart</title>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Giỏ hàng <span style="font-size: 12px;">({{count($carts)}} sản phẩm)</span></h3>
            </div>
            <div class="card-body table-responsive p-0">
                <div class="row">
                    <div class="col-9">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $key => $cart)
                                <tr>
                                    <td>{{$cart->name}}</td>
                                    <td><img src="{{ $cart->options['image'] }}" width="100px" alt=""></td>
                                    <td>{{$cart->qty}}</td>
                                    <td>{{number_format($cart->qty*$cart->price)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Thanh toán :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4><p>Tạm tính   :</p><span>{{number_format($total)}} đ</span></h4>
                                        <hr>
                                        <h4><p>Thành tiền :</p><span style="color: red; font-size: 24px;">{{number_format($total)}} đ</span></h4>
                                        <p>(Đã bao gồm VAT nếu có)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="{{route('frontend.checkout')}}" class="btn btn-danger -align-right">Tiến hành đặt hàng</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
