<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Homes()
    {
        $featured_product = Product::where('trending','1')->take(3)->get();
        $categories = Category::where('status','0')->take(4)->get();
        return view('Frontend.Home.home',compact('featured_product','categories'));
    }
    
}
