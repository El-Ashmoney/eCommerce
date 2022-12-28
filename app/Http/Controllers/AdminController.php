<?php

namespace App\Http\Controllers;

use \PDF;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function view_category(){
        if(Auth::user()){
            $categories = Category::all();
            return view('admin.category', compact('categories'));
        }else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        $data = new Category();
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted Successfully');
    }

    public function view_product(){
        if(Auth::user()){
            $categories = Category::all();
            $products = Product::all();
            return view('admin.product', compact('products', 'categories'));
        }else{
            return redirect('login');
        }
    }

    public function add_product(Request $request){
        $product = new Product();
        $product->title            = $request->title;
        $product->description      = $request->description;
        $product->price            = $request->price;
        $product->quantity         = $request->quantity;
        $product->discount_price   = $request->discount_price;
        $product->category         = $request->product_category;
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->image = $imageName;
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product(){
        if(Auth::user()){
            $products = Product::orderBy('id', 'DESC')->paginate(5);
            return view('admin.show_product', compact('products'));
        }else{
            return redirect('login');
        }
    }

    public function update_product($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.update_product', compact('product', 'categories'));
    }

    public function update_product_confirm(Request $request, $id){
        $product = Product::find($id);
        $product->title             = $request->title;
        $product->description       = $request->description;
        $product->price             = $request->price;
        $product->quantity          = $request->quantity;
        $product->discount_price    = $request->discount_price;
        $product->category          = $request->product_category;
        $product->title             = $request->title;
        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->back()->with('message', 'Product updated Successfully');
    }

    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted Successfully');
    }

    public function order(){
        if(Auth::user()){
            $orders = Order::orderBy('id', 'DESC')->paginate(5);
            return view('admin.order', compact('orders'));
        }else{
            return redirect('login');
        }
    }

    public function delete_order($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('message', 'Order deleted Successfully');
    }

    public function deliver_order($id){
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->payment_status = "paid";
        $order->save();
        return redirect()->back()->with('message', 'Order Status Changed To Delivered');
    }

    public function download_pdf($id){
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return view('admin.pdf', compact('order'));
        // return $pdf->download('order_details.pdf');
    }

    public function send_email($id){
        $order = Order::find($id);
        return view('admin.send_email', compact('order'));
    }

    public function send_user_email(Request $request, $id){
        $order = Order::find($id);
        $details = [
            'greeting'      => $request->greeting,
            'firstLine'     => $request->firstLine,
            'emailBody'     => $request->emailBody,
            'buttonName'    => $request->buttonName,
            'emailUrl'      => $request->emailUrl,
            'lastLine'      => $request->lastLine,
        ];
        Notification::send($order, new EmailNotification($details));
        return redirect()->back();
    }

    public function search_data(Request $request){
        $searchInput = $request->search;
        $orders = Order::where('name', 'LIKE', "%$searchInput%")->paginate(5);
        return view('admin.order', compact('orders'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function search_product(Request $request){
        $search_text = $request->search;
        $products = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->paginate(5);
        return view('admin.show_product', compact('products'));
    }

}
