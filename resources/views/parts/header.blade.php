    <header id="header">
        <div class="container">
            <div class="row-flex">
                <div class="header-bar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div>
                <div class="header-logo slide-top-effect">
                    <a href="/home"><img src="{{ asset('frontend/asset/images/logo.png') }}" alt=""></a>
                </div>
                <div class="header-logo-mobile">
                    <img src="{{ asset('frontend/asset/images/logo-mobile.png') }}" alt="">
                </div>
                <div class="header-nav slide-bottom-effect">
                    <nav>
                        <ul>
                            <li><a href="/home">SẢN PHẨM</a>
                            </li>
                            @foreach ($brands as $brand)
                                <li><a href="/product/{{ $brand->origin }}">{{ mb_strtoupper($brand->origin) }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="header-search slide-top-effect">
                    <form action="/product/text" method="post">
                        <input type="text" name="text" placeholder="Tìm kiếm">
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                                <path
                                    d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11" />
                            </svg></button>
                        @csrf
                    </form>
                </div>
                <a href="/cart">
                    <div class="header-cart slide-right-effect" number="{{ $total_quantity }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart2" viewBox="0 0 16 16">
                            <path
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                        <div class="cart-animated">
                            <img src="{{ asset('frontend/asset/icon_gif/shopping-cart.gif') }}" alt="">
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </header>
    </div>
    </div>
    </header>
