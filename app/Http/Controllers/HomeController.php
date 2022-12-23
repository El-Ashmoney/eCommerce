<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        $products = Product::paginate(6);
        return view('home.userpage', compact('products'));
    }

    public function redirect(){
        $userType = Auth::User()->usertype;
        if ($userType == '1'){
            $products       = Product::all()->count();
            $orders         = Order::all()->count();
            $users          = User::all()->count();
            $order          = Order::all();
            $total_revenues = 0;
            foreach($order as $order_revenue){
                $total_revenues = $total_revenues + $order_revenue->product_price;
            }
            $delivered_orders   = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $ongoing_orders     = Order::where('delivery_status', '=', 'processing')->get()->count();
            return view('admin.home', compact('products', 'orders', 'users', 'total_revenues', 'delivered_orders', 'ongoing_orders'));
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
            $user_id = $user->id;
            $product = Product::find($id);
            $product_exist = Order::where('product_id', '==', $id)->where('user_id', '==', $user_id)->get('id')->first();
            if($product_exist){
                $cart = Cart::find($product_exist)->first();
                $quantity = $cart->product_quantity;
                $cart->product_quantity = $quantity + $request->quantity;
                $cart->save();
                return redirect()->back();
            }else{
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
                Alert::success('Thank you for purchasing the product','Product Added Successfully');
                return redirect()->back();
            }
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
        Alert::success('Order has been removed');
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
        Alert::success('We received your order','We will be contact with you soon');
        return redirect()->back();
    }

    public function stripe($total_price){
        Alert::success('We received your order','We will be contact with you soon');
        return view('home.stripe', compact('total_price'));
    }

    public function stripePost(Request $request, $total_price){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thank's for payment"
        ]);
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
            $order->payment_status   = 'Paid';
            $order->delivery_status  = 'processing';
            $order->save();
            $cart_id = $product->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success', 'Payment successful!');
        return back();
    }

    public function show_order(){
        $user = Auth::user();
        $userId = $user->id;
        $orders = Order::where('user_id', '=', $userId)->paginate(5);
        return view('home.show_order', compact('orders'));
    }

    public function cancel_order($id){
        $order = Order::find($id);
        $order->delivery_status = ('Order canceled by the user');
        $order->save();
        return redirect()->back();
    }

    public function show_comments(){
        if(Auth::id()){
            $comments = Comment::orderby('id','DESC')->get();
            $replies = Reply::orderby('id','DESC')->get();
            return view('home.show_comments', compact('comments', 'replies'));
        }else{
            return redirect('login');
        }
    }

    public function add_comment(Request $request){
        $user = Auth::user();
        $comment = new Comment;
        $comment->name      = $user->name;
        $comment->user_id   = $user->id;
        $comment->comment   = $request->comment;
        $comment->save();
        Alert::success('Your Comment Has Been Sent');
        return redirect()->back();
    }

    public function add_reply(Request $request){
        $user = Auth::user();
        $reply = new Reply;
        $reply->name        = $user->name;
        $reply->reply       = $request->reply;
        $reply->comment_id  = $request->commentId;
        $reply->user_id     = $user->id;
        $reply->save();
        Alert::success('Your Reply Has Been Sent');
        return redirect()->back();
    }

    public function product_search(Request $request){
        $search_text = $request->search;
        $products = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->paginate(5);
        return view('home.userpage', compact('products'));
    }

    public function products(){
        $products = Product::paginate(6);
        return view('home.all_products', compact('products'));
    }
}
