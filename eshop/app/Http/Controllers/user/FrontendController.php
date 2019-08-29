<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Size;
use App\Slider;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function userIndex()
    {
        $products = Product::all();
        //------- limit
        //$products = Product::limit(5)->get();

        $sliders =  Slider::all();
        $categories = Category::all();
        $sizes = Size::all();

        return view('user/index', compact('products','sliders','categories'));
    }

    public function productDetails( $product_id ){
        $productInfo = Product::findOrFail($product_id);
        return view('user/productDetails', compact('productInfo'));
    }
public function addToCart( Request $request ){
        $coustomer_ip = $_SERVER['REMOTE_ADDR'];
        if (Cart::where('coustomer_ip', $coustomer_ip)->where('product_id',$request->product_id)->where('color_id',$request->cs)->where('size_id',$request->sc)->exists()) {
            Cart::where('coustomer_ip', $coustomer_ip)->where('product_id',$request->product_id)->where('color_id',$request->cs)->where('size_id',$request->sc)->increment('product_quentity');
        }
        else{
            Cart::Insert([
                'coustomer_ip'   => $coustomer_ip,
                'product_id'    => $request->product_id,
                'color_id'      => $request->cs, // cs == color id from form 
                'size_id'       => $request->sc, // sc == size id from form 
                'created_at'    => Carbon::now(),
            ]);
            
        }
        return back();
    }
}
