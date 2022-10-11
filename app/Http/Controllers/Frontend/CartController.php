<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Cart;
use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function cartList(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                    {
                        return response()->json(['status' => $prod_check->name."Already added to cart"]);
                    }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
    
                    return response()->json(['status' => $prod_check->name."Added to cart"]);

                }
            }
        }
        else
        {
            return response()->json(['status'=>"Login Continue"]);
        }
       
    }
      

      
        
   
    public function viewcart(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        
        return view('Frontend.Product.cartpage', compact('cartitems'));
    }


    
    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->prod_id;
        
            if( Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists() );
            {
                $cartitems = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                if($cartitems !=null){
                   $cartitems->delete();
                }  
        
                return response()->json(['status'=>"Product deleted successfully"]);
            }
          
        } else{
            return response()->json(['status'=> "Login to Continue"]);
            }
       


    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        
        if(Auth::check())
        {
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists());
            {
                $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=>"Quantity updated"]);
            }
        }
    }


    public function cartCount()
    {
        $cartcount =  Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);


    }
   
}