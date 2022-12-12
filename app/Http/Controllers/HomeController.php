<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::paginate(6);
        return view('home.userpage', compact('products'));
    }

    public function redirect(){
        $userType = Auth::User()->usertype;
        if ($userType == '1'){
            return view('admin.home');
        }else{
            $products = Product::paginate(6);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id){
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name             = $user->name;
            $cart->email            = $user->email;
            $cart->phone            = $user->phone;
            $cart->address          = $user->address;
            $cart->product_title    = $product->title;
            $cart->product_quantity = $request->quantity;
            if($product->discount_price != null){
                $cart->product_price = $product->discount_price * $request->quantity;
            }else{
                $cart->product_price    = $product->price * $request->quantity;
            }
            $cart->product_image    = $product->image;
            $cart->product_id       = $product->id;
            $cart->user_id          = $user->id;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect('login');
        }
        return view('');
    }

    public function show_cart(){
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', '=', $id)->get();
        return view('home.show_cart', compact('cart'));
    }

    public function remove_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order(){
        $user = Auth::user();
        $userId = $user->id;
        $data = Cart::where('user_id', '=', $userId)->get();
        foreach($data as $product){
            $order = new Order;
            $order->name             = $product->name;
            $order->email            = $product->email;
            $order->phone            = $product->phone;
            $order->address          = $product->address;
            $order->product_title	 = $product->product_title	;
            $order->product_quantity = $product->product_quantity;
            $order->product_price    = $product->product_price;
            $order->product_image    = $product->product_image;
            $order->product_id       = $product->product_id;
            $order->user_id          = $product->user_id;
            $order->payment_status   = 'cash on delivery';
            $order->delivery_status  = 'processing';
            $order->save();
            $cart_id = $product->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'We received your order, We will be contact with you soon.');
    }

    public function stripe($total_price){
        return view('home.stripe', compact('total_price'));
    }
}
