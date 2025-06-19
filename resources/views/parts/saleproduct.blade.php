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