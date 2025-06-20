
@extends('main')
@section('content')
    <section class="cart-section p-to-top">
        <form action="/cart/send" method="post">
            <div class="container">
                <div class="row-flex row-flex-product-detail">
                    <p>Giỏ hàng </p>
                </div>
                <div class="row-grid">
                    <div class="cart-section-left">
                        <h2 class="main-h2">Chi tiết Đơn hàng</h2>
                        <div class="cart-section-left-detail">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Sản Phẩm</th>
                                        <th>Thành Tiền</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($products as $product)
                                        @php
                                            $price = $product->price_sale * Session::get('cart')[$product->id];
                                            $total += $price;
                                        @endphp
                                        <tr>
                                            <td><img style="width: 70px;" src="{{ asset($product->image) }}" alt="">
                                            </td>
                                            <td>
                                                <div class="product-detail-right-infor">
                                                    <h1>{{ $product->name }}</h1>
                                                    <div class="product-item-price">
                                                        <p>{{ number_format($product->price_sale) }}<sup>đ</sup><span>{{ number_format($product->price_normal) }}<sup>đ</sup></span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="product-detail-right-quantity-input">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="minus-icon" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                                    </svg>
                                                    <input onkeydown="return false" class="quantity-input"
                                                        name="product_id[{{ $product->id }}]" type="number"
                                                        value="{{ Session::get('cart')[$product->id] }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="plus-icon" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                                    </svg>
                                                </div>
                                            </td>
                                            <td>
                                                <p>{{ number_format($price) }} <sup>đ</sup></p>
                                            </td>
                                            <td>
                                                <a href="/cart/delete/{{ $product->id }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50"
                                                        height="50" viewBox="0 0 50 50">
                                                        <path
                                                            d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z">
                                                        </path>
                                                    </svg></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td style="font-weight:bold" colspan="2">Tổng Cộng</td>
                                        <td style="font-weight:bold; text-align:center">
                                            {{ number_format($total) }}<sup>đ</sup>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button formaction="/cart/update" class="main-btn">Cập nhật Giỏ hàng</button>
                            <a style="color: crimson; font-style: italic" href="/">>>>Tiếp tục Mua hàng</a>
                        </div>
                    </div>
                    <div class="cart-section-right">
                        <h2 class="main-h2">Thông tin Giao hàng</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="cart-section-right-input-name-phone">
                            <input type="text" placeholder="Tên" name="name" id="">
                            <input type="tel" placeholder="Điện thoại" name="phone" id="">
                        </div>
                        <div class="cart-section-right-input-email">
                            <input type="email" placeholder="Email" name="email" id="">
                        </div>
                        <div class="cart-section-right-select">
                            <select name="city" id="city">
                                <option value="">Tỉnh/Tp</option>
                            </select>
                            <select name="district" id="district">
                                <option value="">Quận/huyện</option>
                            </select>
                            <select name="ward" id="ward">
                                <option value="">Phường/Xã</option>
                            </select>
                        </div>
                        <div class="cart-section-right-input-address">
                            <input type="text" placeholder="Địa chỉ" name="address" id="">
                        </div>
                        <div class="cart-section-right-input-note">
                            <input type="text" placeholder="Ghi chú" name="note" id="">
                        </div>
                        <button class="main-btn">Gửi Đơn Hàng</button>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </section>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('frontend/asset/js/apiprovince.js') }}"></script>
@endsection
