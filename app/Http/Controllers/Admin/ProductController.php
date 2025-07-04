<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function add_product()
    {
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm'
        ]);
    }

    public function insert_product(Request $request)
    {
        $product = new product();
        $product->name = $request->input('name');
        $product->origin = $request->input('origin');
        $product->price_normal = $request->input('price_normal');
        $product->price_sale = $request->input('price_sale');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->image = $request->input('image');
        $product_images = implode('*', $request->input('images'));
        $product->images = $product_images;
        $product->save();
        return redirect()->back();
    }
    public function list_product()
    {
        $product = DB::table('products')->get()->all();
        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $product
        ]);
    }

    public function delete_product(Request $request)
    {
        product::find($request->product_id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function edit_product(Request $request)
    {
        $product = product::find($request->id);
        return view('admin.product.edit', [
            'title' => 'Sửa Sản Phẩm',
            'product' => $product
        ]);
    }
    public function update_product(Request $request)
    {
        $product = product::find($request->id);
        $product->name = $request->input('name');
        $product->origin = $request->input('origin');
        $product->price_normal = $request->input('price_normal');
        $product->price_sale = $request->input('price_sale');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->image = $request->input('image');
        $product_images = implode('*', $request->input('images'));
        $product->images = $product_images;
        $product->save();
        return redirect('/admin/product/list');
    }
}
