<?php

namespace App\Http\Controllers\user;


use App\Cart;
use App\Cupon;
use Carbon\Carbon;
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
}
