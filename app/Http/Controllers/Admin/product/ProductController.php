<?php

namespace App\Http\Controllers\Admin\product;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $product=Product::orderBy('id', 'DESC')->get();  
        return view('Admin.Product.product_info' , compact('product'));
    }
    public function add(){
       
        $category=Category::all();
        return view('Admin.Product.addproduct',compact('category'));
    }

    public function insert(Request $request){
        $product= new Product();
        if($request->hasFile('image'))
        {

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/products'), $filename);
            $product['image']= $filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->old_price = $request->input('old_price');
        $product->new_price = $request->input('new_price');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE?'1':'0';
        $product->trending = $request->input('trending') == TRUE?'1':'0';
       
        $product->save();
        return redirect()->route('product')->with('status',"Product Added Successfully.");

    }
    public function edit($id){
        $product = Product::find($id);

        return view('Admin.Product.edit_product',compact('product'));
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        if($request->hasFile('image'))
        {
            $path = asset('images/category/'.$product->image);
            if(File::exists($path)){
                File::delete($path);
            }
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/products'), $filename);
            $product['image']= $filename;

        }
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->old_price = $request->input('old_price');
        $product->new_price = $request->input('new_price');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE?'1':'0';
        $product->trending = $request->input('trending') == TRUE?'1':'0';
      
       
        $product->update();
        return redirect()->route('product')->with('status',"Product updated successfully");

    }
}
