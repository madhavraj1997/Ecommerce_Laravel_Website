<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function Products(){
        $products = Product::paginate(6);
        $categories = Category::get();
        return view('Frontend.Product.products', compact('products','categories'));

    }

   
    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $categories= Category::where('slug',$slug)->first();
            $products= Product::where('cate_id',$categories->id)->where('status','0')->get();
            return view('Frontend.Product.viewproducts',compact('categories','products'));
        }
        else{
            return redirect('/')->with('status',"Slug doesnot exist");
        }
    }
    
   
    public function details($cate_slug, $prod_slug){
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug', $prod_slug)->first();
                return view('Frontend.Product.productdetails', compact('products'));

                
            }
            else{
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else{
            return redirect('/')->with('status',"No such category found");
        }

       

    }

    public function productview($slug)
    {

        $product = Product::where('slug',$slug)->first();
        
       

        if($product) {
            $products = Product::where('slug', $slug)->first();
            return view('Frontend.Product.productdetails', compact('products')); 
        } else {
            return redirect('/')->with('status',"The link was broken");
        }
    }
    public function searchProduct(){
        $products = Product::select('name')->where('status','0')->get();
        $data=[];
        foreach($products as $item){
            $data[] = $item['name'];
            }
        
        return $data;    

    }
    public function Productsearch(Request $request){
        $searched_product = $request->product_name;
        if($searched_product != "")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('view-category/'.$product->category->slug.'/'.$product->slug);
            }
            else{
                return redirect()->back()->with("status","No products found");
            }
        }
        else{
            return redirect()->back();
        }
    }
}
