@extends('admin.main')
@section('content')
    <form action="" enctype="multipart/form-data" method="post">
        <div class="admin-content-main-product-add">
            <div class="admin-content-main-left">
                <div class="admin-content-main-double-input">
                    <input type="text" value="{{ $product->name }}" name="name" placeholder="Tên Sản Phẩm">
                    <input type="text" value="{{ $product->origin }}" name="origin" placeholder="Nơi Sản Xuất">
                </div>
                <div class="admin-content-main-double-input">
                    <input type="text" value="{{ $product->price_normal }}" name="price_normal" placeholder="Giá Bán">
                    <input type="text" value="{{ $product->price_sale }}" name="price_sale" placeholder="Giá Giảm">
                </div>
                <div class="ckeditor">
                    <textarea class="editor_des" value="" name="description" id="" rows="30">{{ $product->description }}</textarea>
                </div>
                <div class="ckeditor">
                    <textarea class="editor_content" value="" name="content" id="">{{ $product->content }}</textarea>
                </div>
                <button type="submit" class="main-btn">Cập Nhật Sản Phẩm</button>
            </div>
            <div class="admin-content-main-right">
                <div class="admin-content-main-right-image">
                    <label for="file">Ảnh Đại Diện</label>
                    <input id="file" type="file">
                    <input type="hidden" name="image" value="{{ $product->image }}" id="input-file-img-hiden">
                    <div class="image-display" id="input-file-img">
                        <img src="{{ asset($product->image) }}" alt="">
                    </div>
                </div>
                <div class="admin-content-main-right-images">
                    <label for="files">Ảnh Sản Phẩm</label>
                    <input id="files" type="file" multiple>
                    <div class="images-display" id="input-file-imgs">
                        @php
                            $product_images = explode('*', $product->images);
                        @endphp
                        @foreach ($product_images as $product_image)
                            <img src="{{ $product_image }}" alt="">
                            <input type="hidden" name="images[]" value="{{ $product_image }}" id="input-file-img-hiden">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>
@endsection()
@section('footer')
    <script type="importmap">
    {
    "imports": {
        "ckeditor5": "{{ asset('backend/asset/ckeditor5-Digital_World/ckeditor5/ckeditor5.js') }}",
        "ckeditor5/": "{{ asset('backend/asset/ckeditor5-Digital_World/ckeditor5') }}/"
    }
}
</script>
    <script type="module" src="{{ asset('backend/asset/ckeditor5-Digital_World/main.js') }}"></script>
    <script src="{{ asset('backend/asset/js/product_ajax.js') }}"></script>
@endsection()
