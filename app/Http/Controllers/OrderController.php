<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('editor');
    }
    
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', ['orders' => $orders]);
    }
    public function view($id){
        $order = Order::find($id);
        return view('admin.order.view', ['order' => $order]);
    }

    public function update(Request $req, $id){
        $order = Order::find($id);

        $order->status = $req->status;

        $order->update();
        return redirect('/admin/orders')->with('message', 'Order Updated Successfuly');
    }

    public function delete($id){
        $order = Order::find($id);
        $order->delete();

        return redirect('/admin/orders')->with('message', 'Order Deleted Successfuly');
    }
}
