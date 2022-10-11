<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $usercount =  User::where('role_as','0')->count();
        $admincount = User::where('role_as','1')->count();
        $products = Product::count();
        $orders = Order::count();
        return view('Admin.Dashboard.landing', compact('usercount','products','orders','admincount'));
    }

  
}
