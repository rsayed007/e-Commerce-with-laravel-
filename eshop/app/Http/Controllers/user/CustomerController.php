<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\City;
use App\Seal;
use App\Country;
use App\Product;
use Carbon\Carbon;
use App\CustomerInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    function customerDashboard(){
        $sales = Seal::where('coustomer_ip', $_SERVER['REMOTE_ADDR'])->get();
        return view('user/customer/customer',compact('sales'));
    }
    function customerProfile(){
        return view('user/customer/profile');
    }
    function customerProfileInsert(Request $request){
        $request->validate([
            'user_id'  => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        CustomerInfo::insert([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    function customerProfileUpdate(Request $request){
        $request->validate([
            'user_id'  => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        CustomerInfo::where('user_id', $request->user_id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
        ]);
        return back();
    }
    function checkout(Request $request){
        $coupon_amount = $request->coupon_amount;
        $shipping = $request->shipping;

        $cartItems = Cart::where('coustomer_ip', $_SERVER['REMOTE_ADDR'])->get();
        $total_price= 0;
        foreach ($cartItems as $key => $cartItem) {
            $product_price = Product::find($cartItem->product_id)->product_price * $cartItem->product_quentity;
            $total_price += $product_price;
        }
        
        $countries = Country::all();
        return view('user/customer/checkout', compact('countries','total_price','coupon_amount','shipping'));
    }

    function getCityList( Request $request){        
        $cityList = '' ;
        $cityData= City::where('country_id', $request->country_id)->get();
        foreach ($cityData as $cities) {
            //$cityList .= $cities->name;
            $cityList .= "<option value='".$cities->id."' > $cities->name </option>";
        }
        // echo $cityList;
    }
}
