@extends('main')
@section('content')
    <section class="product-detail p-to-top">
        <form action="/cart/add" method="post">
            <div class="container">
                <div class="row-flex row-flex-product-detail slide-left-effect">
                    <p>Sản Phẩm </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="row-grid">
                    <div class="product-detail-left">
                        <div class="card-effect">
                            <div class="card">
                                <img class="main-image slide-bottom-effect" src="{{ asset($product->image) }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="product-images-items slide-left-effect">
                            @php
                                $product_images = explode('*', $product->images);
                            @endphp
                            @foreach ($product_images as $product_image)
                                <img src="{{ asset($product_image) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="product-detail-right">
                        <div class="product-detail-right-infor">
                            <h1 class="slide-right-effect">{{ $product->name }}</h1>
                            <div class="origin slide-left-effect">
                                <span>{{ $product->origin }}</span>
                            </div>
                            <div class="product-item-price slide-right-effect">
                                <p>{{ number_format($product->price_sale) }}<sup>đ</sup><span>{{ number_format($product->price_normal) }}<sup>đ</sup></span>
                                </p>
                            </div>
                        </div>
                        <div class="product-detail-right-des slide-left-effect">
                            <h2>Thông Tin Sản Phẩm</h2>
                        </div>
                        <div class="product-detail-right-des slide-right-effect">
                            {!! $product->description !!}
                        </div>
                        <div class="product-detail-right-quantity">
                            <h2 class="slide-top-effect">Số lượng:</h2>
                            <div class="product-detail-right-quantity-input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="minus-icon slide-left-effect" viewBox="0 0 16 16">
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                </svg>
                                <input onkeydown="return false" class="quantity-input" name="product_quantity"
                                    type="number" value="1">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="plus-icon slide-right-effect" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                </svg>
                            </div>
                        </div>
                        <div class="product-detail-right-add-to-cart slide-bottom-effect">
                            <button type="submit" class="main-btn">Thêm Vào Giỏ Hàng</button>
                        </div>
                    </div>
                </div>
                <div class="row-flex">
                    <div class="product-detail-content slide-bottom-effect">
                        <h2>Chi tiết Sản Phẩm</h2>
                        {!! $product->content !!}
                    </div>
                </div>
            </div>



            @csrf
        </form>

    </section>
@endsection
