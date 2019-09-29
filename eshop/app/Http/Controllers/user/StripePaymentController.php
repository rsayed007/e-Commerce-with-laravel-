<?php

namespace App\Http\Controllers\user;

use Stripe;
use Session;

use App\Cart;
use App\Seal;
use App\Product;
use Carbon\Carbon;
use Stripe\Charge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

   

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe( Request $request)

    {
        // return $request->all();
        $total_price = $request->total_amount;
        return view('user/orderPlace', compact('total_price'));

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {
        $total_price =  $request->total_price;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $total_price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

            // if payment Done

          $cartInfos = Cart::where('user_id',Auth::id());

          foreach ($cartInfos as $key => $cartInfo) {
              //echo $cartInfo->product_quentity;
              Seal::insert([
                'user_id' => Auth::id(),
                'coustomer_ip' => $cartInfo->coustomer_ip,
                'product_id' => $cartInfo->product_id,
                'color_id' => $cartInfo->color_id,
                'size_id' => $cartInfo->size_id,
                'product_quentity' => $cartInfo->product_quentity,
                'product_price' => Product::find($cartInfo->product_id)->product_price,
                'created_at' => Carbon::now(),
              ]);
              Cart::where('coustomer_ip', $_SERVER['REMOTE_ADDR'])->delete();
          }

        Session::flash('success', 'Payment successful!');
        return redirect('cart/view');

    }

}