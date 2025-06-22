@extends('main')
@section('content')
    <section class="order-confirm p-to-top">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Xác Nhận Đơn Hàng: <span style="font-weight: bold;">#37-Thành Công !</span> </p>
            </div>
            <div class="row-flex">
                <div class="order-confirm-content">
                    <p>Đơn hàng của bạn đã được xác nhận <span style="font-weight: bold;">Thành Công</span> ! <br>
                        <span style="font-size: medium; font-weight: bold;">Cảm ơn bạn vì đã tin tưởng và ủng hộ shop &lt3!!!
                        </span> <br>
                        <span style="font-size: small;"> Chúng tôi sẽ <span
                                style="font-style: italic; font-weight: bold;">Giao hàng </span>trong thời gian 1 tuần tới
                            sau khi bạn thanh toán 🤑🤑🤑
                        </span>
                    </p>
                    <br>
                    <form action="{{ url('/momo_payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="total_momo" value="10000">
                        <button style="background-color: red" type="submit" class="main-btn" name="payUrl">🤑Thanh
                            toán MOMO🤑</button>
                    </form>
                    <br>
                    <form action="{{ url('/vnpay_payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="total_vnpay" value="10000">
                        <button style="background-color: red" type="submit" class="main-btn" name="redirect">🤑Thanh toán
                            VNPAY🤑</button>
                    </form>

                    <br>
                    <button class="main-btn">
                        Tiếp tục mua hàng
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
