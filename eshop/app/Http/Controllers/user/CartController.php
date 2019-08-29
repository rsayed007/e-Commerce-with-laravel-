<?php

namespace App\Http\Controllers\user;


use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    function viewCart(){
        $coustomer_ip = $_SERVER['REMOTE_ADDR'];
        $cart_items = Cart::where('coustomer_ip',$coustomer_ip)->get();
        
        return view('user.cart', compact('cart_items'));
    }
}
