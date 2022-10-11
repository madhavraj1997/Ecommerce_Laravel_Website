<?php

namespace App\Http\Controllers\Admin\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','0')->get();
        $orders = Order::orderBy('id','DESC')->get();
        return view('Admin.Order.order-info',compact('orders'));
    }
    public function orderview($id)
    {
        $orders = Order::where('id',$id)->first();
        return view('Admin.Order.order-view', compact('orders'));
    }
    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        
        return redirect()->route('order')->with('status'," Order updated successfully.");
    }
}  
