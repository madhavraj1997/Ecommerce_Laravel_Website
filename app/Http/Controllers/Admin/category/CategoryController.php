<?php

namespace App\Http\Controllers\Admin\category;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function Index(){
        $category = Category::orderBy('id','DESC')->get();
        return view('Admin.Category.category-info', compact('category'));
    }
    public function add(){
        $category = Category::all();
        return view('Admin.Category.addcategory', compact('category'));
    }
    public function insert(Request $request){
        $category = new Category();
        if($request->hasFile('image'))
        {

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/category'), $filename);
            $category['image']= $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
       
        $category->save();
        return redirect()->route('category')->with('status',"Category Added Successfully.");


    }
    public function edit($id){
        $category = Category::find($id);

        return view('Admin.Category.editcategory',compact('category'));

    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = asset('images/category/'.$category->image);
            if(File::exists($path)){
                File::delete($path);
            }
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/category'), $filename);
            $category['image']= $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
       
        $category->update();
        return redirect()->route('category')->with('status',"Category updated successfully");
    }
}
