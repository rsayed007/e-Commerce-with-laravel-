<?php


namespace App\Http\Controllers\admin;

use App\Cupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CuponController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function addCoupon()
    {
        $coupons = Cupon::all();
        return view('admin.coupon.addCoupon', compact('coupons'));
    }
    public function createCoupon(Request $request)
    {
        $request->validate([
            'coupon_name'   => 'required|unique:cupons,coupon_name',
            'valid_date'    => 'required',
            'coupon_amount' => 'required|numeric|max:100',

        ]);
        Cupon::Insert([
            'coupon_name'   => $request->coupon_name,
            'valid_date'    => $request->valid_date,
            'coupon_amount' => $request->coupon_amount,
            'created_at'    => Carbon::now(),

        ]);
        return back()->with('status','Coupon successfully added');
    }
}
