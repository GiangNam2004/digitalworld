<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts.head')
</head>

<body>
    <!--header-->
    @include('parts.header')
    {{-- loading --}}
    <div class="loading-effect">
        <div class="cat">
            <div class="ear ear-l">
            </div>
            <div class="ear ear-r">
            </div>
            <div class="eye eye-l">
                <div class="circle">
                </div>
            </div>
            <div class="eye eye-r">
                <div class="circle">
                </div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
            <div class="whiskers whiskers-1">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="whiskers whiskers-2">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="path">
            <div class="mouse">
                <div class="tail"></div>
            </div>
        </div>
    </div>
    <div class="dark-effect"></div>
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
                class="bi bi-arrow-left slide-right-effect" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right slide-left-effect" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
            </svg>
        </div>
    </section>
    <!--sale-product-->
    <section class="sale-products">
        <div class="container">
            <div class="row-grid">
                <p class="heading-text slide-left-effect">Sản Phẩm Mới</p>
            </div>
            <div class="row-grid row-grid-sale-product">
                @foreach ($products as $product)
                    <div class="sale-product-item slide-bottom-effect">
                        <a href="/product/{{ $product->id }}">
                            <div class="border">
                                <img src="{{ asset($product->image) }}" alt="">
                            </div>
                        </a>
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
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "ece7c765-2090-4ee1-a7c8-47b9165a1dcc";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
    <script>
        const snowflakesContainer = document.createElement('div');
        snowflakesContainer.classList.add('snowflakes');
        document.body.appendChild(snowflakesContainer); // Thêm div chứa tuyết vào trang

        function createSnowflake() {
            const snowflake = document.createElement('div');
            snowflake.classList.add('snowflake');

            // Vị trí ngẫu nhiên trên màn hình
            snowflake.style.left = `${Math.random() * 100-7}vw`;
            snowflake.style.animationDuration = `${Math.random() * 5 + 7}s`; // Thời gian rơi khác nhau

            const size = Math.random() * 40 + 30; // Tạo kích thước ngẫu nhiên trong phạm vi 10px đến 50px
            snowflake.style.width = `${size}px`;
            snowflake.style.height = `${size}px`;


            // Thêm ảnh bông tuyết vào mỗi bông tuyết
            const img = document.createElement('img');
            img.src =
            '/frontend/asset/images/snowflake.png'; // Đặt URL bức ảnh bông tuyết của bạn (hãy thay bằng URL ảnh bông tuyết thật)
            img.style.width = '100%'; // Điều chỉnh kích thước bông tuyết (tùy ý)
            img.style.height = '100%'; // Điều chỉnh kích thước bông tuyết (tùy ý)
            snowflake.appendChild(img);

            snowflakesContainer.appendChild(snowflake);

            // Xóa bông tuyết khi nó đã rơi hết màn hình
            setTimeout(() => {
                snowflake.remove();
            }, 7000); // Sau 10 giây
        }

        // Tạo bông tuyết mỗi 300ms
        setInterval(createSnowflake, 400);
    </script>
</body>

</html>
