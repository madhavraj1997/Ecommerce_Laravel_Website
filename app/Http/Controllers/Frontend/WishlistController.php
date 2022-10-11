<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('Frontend.Product.wishlist',compact('wishlist'));
    }

    public function addWishlist(Request $request){
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id)){
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status'=>"Product added to wishlist"]);
            }
            else{
                return response()->json(['status'=>"Product doesnot exist"]);
            }

        }
        else{
            return response()->json(['status'=>"Login to continue"]);

        }
    }
    public function removeWishlist(Request $request){
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            
            if( Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists() );
            {
                $wishitems = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                
                $wishitems->delete();
                return response()->json(['status'=>"Wishlist product deleted successfully"]);
            }
          
        } else{
            return response()->json(['status'=> "Login to Continue"]);
            }
       
    }
    public function wishlistCount(){
        $wishlistCount = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$wishlistCount]);
    }
}
