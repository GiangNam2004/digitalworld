@extends('main')
@section('content')
        <section class="order-confirm p-to-top">
        <div class="container">
            <div class="row-flex row-flex-product-detail slide-left-effect">
                <p>Xác Nhận Đơn Hàng: <span style="font-weight: bold;">{{$order->name}}#{{$order->id}}</span> </p>
            </div>
            <div class="row-flex">
                <div class="order-confirm-content">
                    <p class="slide-right-effect">Đơn hàng của bạn đã được gửi <span style="font-weight: bold;">Thành Công</span> ! <br>
                        <span style="font-size: small;"> Vui lòng check <span style="font-style: italic; font-weight: bold;">Email </span>Đã đăng
                            ký để nhận và xác nhận Đơn hàng</span>
                    </p>
                    <br>
                    <button class="main-btn slide-bottom-effect">
                        Tiếp tục mua hàng
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection