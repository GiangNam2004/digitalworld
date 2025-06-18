<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts.head')
</head>

<body>
    <!--header-->
    @include('parts.header')
    <!--slider-->
    <section class="slider">
        <div class="slider-items">
            <div class="slider-item">
                <img src="{{ asset('frontend/asset/images/banner1.jpg') }}" alt="">
            </div>
            <div class="slider-item">
                <img src="{{ asset('frontend/asset/images/banner2.jpg') }}" alt="">
            </div>
            <div class="slider-item">
                <img src="{{ asset('frontend/asset/images/banner3.jpg') }}" alt="">
            </div>
        </div>
        <div class="slider-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
            </svg>
        </div>
    </section>
    <!--sale-product-->
    <section class="sale-products">
        <div class="container">
            <div class="row-grid">
                <p class="heading-text">Sản Phẩm Mới</p>
            </div>
            <div class="row-grid row-grid-sale-product">
                @foreach ($products as $product)
                    <div class="sale-product-item">
                        <a href="/product/{{ $product->id }}"><img src="{{ asset($product->image) }}"
                                alt=""></a>
                        <p><a href="">{{ $product->name }}</a> </p>
                        <span>{{ $product->origin }}</span>
                        <div class="product-item-price">
                            <p>{{ number_format($product->price_sale) }}<sup>đ</sup><span>{{ number_format($product->price_normal) }}<sup>đ</sup></span>
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--footer-->
    @include('parts.footer')
</body>

</html>
