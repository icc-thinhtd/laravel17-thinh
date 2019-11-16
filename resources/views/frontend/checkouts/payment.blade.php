@extends('frontend.layouts.master')
@section('title')
    <title>2nds - Cart</title>
@endsection
@section('content')
    <div class="container">
        <div class="container">
            <form action="{{route('frontend.checkout.payment')}}" method="post" role="form" id="address-info">
                <div class="card">
                    <div class="card-header">
                        <h3>3. Thông tin thanh toán</h3>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            @csrf
                            <div class="form-group row">
                                <label for="full_name" class="col-lg-4">Họ tên </label>
                                <div class="col-lg-8">
                                    <input type="text" name="full_name" value="@if($user->details) {{$user->details->full_name}} @endif" class="form-control address" id="full_name" placeholder="Nhập họ tên">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-lg-4">Điện thoại</label>
                                <div class="col-lg-8">
                                    <input type="text" name="phone" value="@if($user->details) {{$user->details->phone}} @endif" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-lg-4">Địa chỉ</label>
                                <div class="col-lg-8">
                                    <input type="text" id="address" name="address" value="@if($user->details) {{$user->details->address}} @endif" class="form-control" placeholder="Nhập địa chỉ">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <input type="hidden" name="address_id" value="">
                                    <button id="btn-address" type="submit" class="btn btn-primary btn-custom3" value="create">Giao đến địa chỉ này</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
