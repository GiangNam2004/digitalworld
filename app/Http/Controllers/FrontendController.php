<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\TestMail;
use App\Models\order;
use App\Models\product;
use App\Notifications\EmailNotification;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Request\OrderRequest as RequestOrderRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Exists;

class FrontendController extends Controller
{
    public function index()
    {   
        $brands = product::select('origin')->distinct()->get();
        $products = product::select('name', 'origin', 'price_normal', 'price_sale', 'image', 'id')->get();
        return view('home', [
            'products' => $products,
            'brands' => $brands
        ]);
    }

    public function show_product(Request $request)
    {   
        $products = product::select('name', 'origin', 'price_normal', 'price_sale', 'image', 'id')->get();
        $product = product::find($request->id);
        return view('productdetail', [
            'product' => $product,
            'products' => $products
        ]);
    }
    //cart 
    public function add_cart(Request $request)
    {
        $product_id = $request->product_id;
        $product_quantity = $request->product_quantity;
        if (is_null(Session::get('cart'))) {
            Session::put('cart', [
                $product_id => $product_quantity
            ]);
            return redirect('/cart');
        } else {
            $cart = Session::get('cart');
            if (Arr::exists($cart, $product_id)) {
                $cart[$product_id] = $cart[$product_id] + $product_quantity;
                Session::put('cart', $cart);
                return redirect('/cart');
            } else {
                $cart[$product_id] = $product_quantity;
                Session::put('cart', $cart);
                return redirect('/cart');
            }
        }
    }
    public function show_cart()
    {   
        $cart  = Session::get('cart');
        if (empty($cart)) {
            return view('cart', [
                'products' => []
            ]);
        } else {
            $product_id = array_keys($cart);
            $products = product::whereIn('id', $product_id)->get();
            return view('cart', [
                'products' => $products
            ]);
        }
    }
    public function delete_cart(Request $request)
    {
        $cart = Session::get('cart');
        $product_id = $request->id;
        unset($cart[$product_id]);
        Session::put('cart', $cart);
        return redirect('/cart');
    }
    public function update_cart(Request $request)
    {
        $cart = $request->product_id;
        Session::put('cart', $cart);
        return redirect('/cart');
    }
    public function send_cart(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $token = Str::random(12);
        $order = new order;
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->city = $request->input('city');
        $order->district = $request->input('district');
        $order->ward = $request->input('ward');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order_detail = json_encode($request->input('product_id'));
        $order->order_detail = $order_detail;
        $order->token = $token;
        $order->save();
        Session::forget('cart');
        $maillink = $order->email;
        $mailname = $order->name;
        $tokenconfirm = $order->token;
        $Mail = Mail::to($maillink)->send(new TestMail($mailname, $tokenconfirm));
        Notification::send($order, new EmailNotification($order));
        return redirect('/order/confirm/'.$order -> id);
    }
    public function show_login()
    {
        return view('admin.login');
    }
    public function check_login(Request $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]
        )) {
            return redirect('admin');
        }
        return redirect()->back();;
    }
    public function confirm_order(Request $request){
        $products = product::select('name', 'origin', 'price_normal', 'price_sale', 'image', 'id')->get();
        $order = order::find($request->id);
        return view('order.confirm',[
            'order'=>$order,
            'products'=>$products
        ]);
    }
    public function success_order(){
        $products = product::select('name', 'origin', 'price_normal', 'price_sale', 'image', 'id')->get();
        return view('order.success',[
            'products'=>$products
        ]);
    }
}
