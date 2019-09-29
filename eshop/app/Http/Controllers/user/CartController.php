<?php

namespace App\Http\Controllers\user;


use App\Cart;
use App\Cupon;
use App\Product;
use Carbon\Carbon;
use App\CustomerInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    function viewCart($coupon_name = ''){

        if($coupon_name == ''){
            $coupon_amount = 0;
            $coustomer_ip = $_SERVER['REMOTE_ADDR'];
            $cart_items = Cart::where('coustomer_ip',$coustomer_ip)->get();
            return view('user.cart', compact('cart_items', 'coupon_amount'));
        }else{
            if (Cupon::where('coupon_name',$coupon_name)->exists()) {
                $valid_date = Cupon::where('coupon_name',$coupon_name)->first()->valid_date;
                $today_date = Carbon::now()->format('Y-m-d');
                if($valid_date >= $today_date){
                    $coupon_amount = Cupon::where('coupon_name',$coupon_name)->first()->coupon_amount;
                    
                    $coustomer_ip = $_SERVER['REMOTE_ADDR'];
                    $cart_items = Cart::where('coustomer_ip',$coustomer_ip)->get();
                    return view('user.cart', compact('cart_items', 'coupon_amount'));
                }else{
                    return back()->withErrors('Coupon validation time is over ');
                }
            }
            else{
                return back()->withErrors('This coupon not valid');
            }
        }
    }
    function deleteCart( $cart_id){
        
        Cart::findOrFail($cart_id)->delete();
        return back()->with('status','Product successfully DElete');
    }
    
    function updateCart( Request $request){

        $coustomer_ip = $_SERVER['REMOTE_ADDR'];
         //$request->all());
        foreach ($request->product_id as $key => $value) {
            
            $product_id = $value;
            $color_id = $request->color_id[$key];
            $size_id = $request->size_id[$key];
            $product_quentity = $request->product_quentity[$key];

            if (($product_quentity <= Product::find($product_id)->product_quantity) && ($product_quentity >0)) {
                Cart::where('coustomer_ip', $coustomer_ip)->where('product_id', $product_id)->where('color_id', $color_id)->where('size_id',$size_id)->update([
                    'product_quentity' => $product_quentity,
                ]);
                return back();
            } else {
                return back()->with('status','Enough Quantity are not available');
            }
            


            // echo $key;
            // if ($key != '_token') {
            //     foreach ($value as $key => $value) {
            //         echo '<br>';
            //         print_r( $value);
            //     }
            // }

        }
        return back()->with('status','Product successfully Update');
    }    
}
