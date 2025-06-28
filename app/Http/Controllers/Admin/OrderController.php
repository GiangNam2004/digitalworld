<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

use function Laravel\Prompts\alert;

class OrderController extends Controller
{
    public function list_order(Request $request)
    {
        $index = session('index', 0);
        $totalOrders = Order::count();
        if ($request->text == 'right') {
            if (($index * 6 + 6) <= $totalOrders) {
                $index++;
                $orders = Order::skip($index * 6)->take(6)->get();
            } else {
                $orders = Order::skip($index * 6)->take(6)->get();
            }
            session(['index' => $index]);
        } else {
            if ($index > 0) {
                $index--;
                $orders = Order::skip($index * 6)->take(6)->get();
            } else {
                $orders = Order::skip($index * 6)->take(6)->get();
            }
            session(['index' => $index]);
        }
        return view('admin.order.list', [
            'orders' => $orders,
            'title'=>'Danh Sách Đơn Hàng'
        ]);
    }

    public function detail_order(Request $request)
    {
        $order_detail = json_decode($request->order_detail, true);
        $product_id = array_keys($order_detail);
        $products = product::whereIn('id', $product_id)->get();
        return view('admin.order.detail', [
            'products' => $products,
            'order_detail' => $order_detail,
            'title'=>'Chi Tiết Đơn Hàng'
        ]);
    }
    public function delete_order(Request $request)
    {
        order::find($request->order_id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function check_order_token(Request $request)
    {
        $name  = $request->query('name');
        $token = $request->query('token');
        $order = order::where('token', $token)->firstOrFail();
        if ($order->name !== $name) {
            abort(403, 'Sai thông tin xác nhận!');
        } else {
            $order->update([
                'status' => '1',
                'token'  => null,
            ]);
            return redirect('/order/success');
        }
    }
}
