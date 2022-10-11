<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItems;
class CheckoutController extends Controller
{
    public function index(){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $orders = Order::all();
        return view('Frontend.Product.checkout', compact('cartItems','orders'));
    }
    public function placeOrder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->new_price * $prod->prod_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'sasto'.rand(1111,9999);
        $order->save();
        

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $items)
        {
            OrderItems::create([
                'order_id' => $order->id,
                'prod_id' => $items->prod_id,
                'qty' => $items->prod_qty,
                'price'=> $items->products->new_price,
            ]);
            $prod = Product::where('id', $items->prod_id)->first();
            $prod->qty = $prod->qty - $items->prod_qty;
            $prod->update();
        }
        if(Auth::user()->pincode == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();

        }
        $cartitems =  Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect()->route('payment', [$order->id])->with('status',"Order placed Successfully"); 

    }

    public function payment($orderID){
        $order = Order::where('id', $orderID)->first();
        return view('Frontend.Product.payment', compact('order'));
    }
   
}
