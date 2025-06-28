@extends('admin.main')
@section('content')
<form action="/admin/product/add" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-product-add">
        <div class="admin-content-main-left">
            <div class="admin-content-main-double-input slide-left-effect">
                <input type="text" value="{{old('name')}}" required name="name" placeholder="Tên Sản Phẩm">
                <input type="text" value="{{old('origin')}}" name="origin" placeholder="Nơi Sản Xuất">
            </div>
            <div class="admin-content-main-double-input slide-right-effect">
                <input type="text" value="{{old('price_normal')}}" name="price_normal" placeholder="Giá Bán">
                <input type="text" value="{{old('price_sale')}}" name="price_sale" placeholder="Giá Giảm">
            </div>
            <div class="ckeditor slide-top-effect">
                <textarea class="editor_des" value="{{old('description')}}" name="description" id="" rows="30">Đặc Điểm Nổi Bật</textarea>
            </div>
            <div class="ckeditor slide-bottom-effect">
                <textarea class="editor_content" value="{{old('content')}}" name="content" id="">Mô tả sản Phẩm</textarea>
            </div>
            <button type="submit" class="main-btn slide-left-effect">Thêm Sản Phẩm</button>
        </div>
        <div class="admin-content-main-right">
            <div class="admin-content-main-right-image slide-bottom-effect">
                <label for="file">Ảnh Đại Diện</label>
                <input id="file" type="file">
                <input type="hidden" name="image" id="input-file-img-hiden">
                <div class="image-display" id="input-file-img">
                </div>
            </div>
            <div class="admin-content-main-right-images slide-top-effect">
                <label for="files">Ảnh Sản Phẩm</label>
                <input id="files" type="file" multiple>
                <div class="images-display" id="input-file-imgs">
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
<script type="module" src="{{asset('backend/asset/ckeditor5-Digital_World/main.js')}}"></script>
<script src="{{asset('backend/asset/js/product_ajax.js')}}"></script>
@endsection()