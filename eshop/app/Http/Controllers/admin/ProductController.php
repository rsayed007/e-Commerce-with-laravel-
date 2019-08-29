<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Size;
use App\Color;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function adminIndex()
    {
        return view('admin.home');
    }
    public function addProduct()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.addProduct', compact('categories','colors','sizes'));

    }
    public function productInsert(Request $request)
    {
        
        // return $request->all();
            $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'alert_quantity' => 'required|numeric',
        ]);

        // ---------use collection for store multi color 
        $color_collection = collect([]);
        foreach ($request->colors_id as $key=>$colors_value){
            $color_collection->put('color_id'.$key, $colors_value);
        }

        // ---------use collection for store multi color 
        
        $size_collection = collect([]);
        foreach ($request->sizes_id as  $key=>$size_value) {
            $size_collection->put('sizes_id'.$key, $size_value);
        }
        //print_r($size_collection->all());


        $product_id =  Product::insertGetId([
            'product_name'          =>$request->product_name,
            'category_id'           =>$request->category_id,
            'available_colors'      =>$color_collection,
            'available_sizes'       =>$size_collection,
            'product_price'         =>$request->product_price,
            'product_description'   =>$request->product_description,
            'product_quantity'      =>$request->product_quantity,
            'alert_quantity'        =>$request->alert_quantity,
            'created_at'            => Carbon::now(),

        ]);
        // return $product_id;

        if($request->hasFile('product_image')){
            
            $product_image = $request->file('product_image');
        
            $filename = $product_id . '.' . $product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(150, 195)->save( base_path('public/uploads/image/product/product_image/' . $filename ),40 );
            Product::find($product_id)->update([
                'product_image' =>$filename,
            ]);
        }
        
        return redirect('admin/view/product')->with('status','Product successfully added');

    }
    public function viewProduct()
    {
        $products = Product::paginate(4);
        $deleted_products = Product::onlyTrashed()->get();
        return view('admin.product.viewProduct', compact('products','deleted_products'));
    }
    public function deleteProduct($product_id)
    {
        Product::findOrFail($product_id)->delete();
        return back()->with('status','Product Deleted successfully');
    }
    public function restoreProduct($product_id)
    {
        Product::withTrashed()->findOrFail($product_id)->restore();
        return back()->with('status','Product Deleted successfully');
    }
    public function finalDelete($product_id)
    {
        Product::withTrashed()->findOrFail($product_id)->forceDelete();
        return back()->with('status','Product Deleted successfully');
    }
    public function editProduct($product_id)
    {
       $editInfo = Product::findOrFail($product_id);
        return view('admin.product.editProduct', compact('editInfo'));
    }
    public function updateProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'alert_quantity' => 'required|numeric',
        ]);
        Product::findOrFail($request->product_id)->update([
            'product_name'          =>$request->product_name,
            'product_price'         =>$request->product_price,
            'product_description'   =>$request->product_description,
            'product_quantity'      =>$request->product_quantity,
            'alert_quantity'        =>$request->alert_quantity,
        ]);
        return redirect('admin/view/product')->with('status','Product successfully Update');
    }
}
