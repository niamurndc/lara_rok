<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        session_start();
        $sid = session_id();
        $carts = Cart::where('session_id', $sid)->where('status', '0')->get();
        return view('user.checkout', ['carts' => $carts]);
    }

    public function makeorder(Request $req)
    {
        session_start();
        $sid = session_id();

        $order = new Order();

        $order->name = $req->name;
        $order->email = $req->email;
        $order->phone = $req->phone;
        $order->subtotal = $req->total;
        $order->address = $req->address;
        $order->area = 'Bangladesh';
        $order->status = 0;
        $order->save();
        
        $carts = Cart::where('session_id', $sid)->get();
        foreach($carts as $cart){
            $cart->user_id = Auth::user()->id;
            $cart->order_id = $order->id;
            $cart->status = 1;

            $cart->update();
        }
        return view('user.checkout', ['carts' => $carts]);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function order()
    {
        $email = Auth::user()->email;
        $orders = Order::where('email', $email)->get();
        return view('user.order', ['orders' => $orders]);
    }

    public function vieworder($id)
    {
        $orders = Order::find($id);
        return view('user.view-order', ['order' => $orders]);
    }

    public function changepass(Request $req, $id)
    {
        $user = User::find($id);

        $user->password = Hash::make($req->pass);
        $user->update();
        return redirect('/profile');
    }

    public function addreview(Request $req, $id)
    {
        $review = new Review();

        $review->name = Auth::user()->name;
        $review->email = Auth::user()->email;
        $review->rating = $req->rating;
        $review->body = $req->body;
        $review->product_id = $id;

        $review->save();
        return redirect()->back();
    }
}
