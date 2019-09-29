@extends('user/layouts/app')

@section('main_user_content')

    <!-- Page Info -->
    <div class="page-info-section page-info">
        
            <div class="container">
                <div class="site-breadcrumb">
                    <a href="{{url('/')}}">Home</a> / 
                    <a href="{{url('cart/view')}}">Cart</a> / 
                    <span>Checkout</span>
                </div>
                <img src="img/page-info-art.png" alt="" class="page-info-art">
            </div>
        </div>
        <!-- Page Info end -->
        <div class="page-area cart-page spad">
                <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                    <form class="checkout-form">
                            @auth
                        @php
                            $userData = App\CustomerInfo::where('user_id', Auth::id())->first();
                        @endphp
                                <h4 class="checkout-title">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="First Name *" value="{{$userData->first_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Last Name *" value="{{$userData->last_name}}">
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input type="text" placeholder="Company"> --}}
                                        <select id="country_list">
                                            <option value="">Select Country *</option>
                                            @foreach ($countries as $country)
                                                <option  value="{{$country->id}}">{{$country->name}}</option>

                                            @endforeach
                                        </select>
                                        
                                        <select id="city_list">
                                            <option>City/Town *</option>
                                        </select>
                                        <input type="text" placeholder="Address *" value="{{$userData->address}}">
                                        <input type="text" placeholder="Zipcode *" value="{{$userData->zip_code}}">
                                        
                                        <input type="text" placeholder="Phone no *" value="{{$userData->phone}}">
                                        <input type="email" placeholder="Email Address *" value="{{Auth::user()->email}}">
                                        <div class="checkbox-items">
                                            <div class="ci-item">
                                                <input type="checkbox" name="a" id="tandc">
                                                <label for="tandc">Terms and conditions</label>
                                            </div>
                                            <div class="ci-item">
                                                <input type="checkbox" name="b" id="newaccount">
                                                <label for="newaccount">Create an account</label>
                                                <input type="password" placeholder="password">
                                            </div>
                                            <div class="ci-item">
                                                <input type="checkbox" name="c" id="newsletter">
                                                <label for="newsletter">Subscribe to our newsletter</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="row">
                                <div class="col-md-6 offset-md-3 order-card text-center" >
                                        <h4 class="checkout-title ">Please <a href="{{url('login')}}">Login</a> First</h4>
                                </div>
                                
                            </div>

                        @endauth
                    </form>

                            </div>
                            <div class="col-lg-6">
                                <div class="order-card">
                                    <div class="order-details">
                                        <div class="od-warp">
                                            <h4 class="checkout-title">Your order</h4>
                                            <table class="order-table">
                                                <thead>
                                                    <tr>
                                                        <th>Total</th>
                                                        <th>{{$total_price}}</th>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th>coupon amount %</th>
                                                        <th>{{$coupon_amount}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping Cost</th>
                                                        <th>${{$shipping}}</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="payment-method order-total">
                                                        <th>Total</th>
                                                        <th>
                                                            @php
                                                                $total = ($total_price - (($total_price * $coupon_amount)/100))+$shipping;
                                                                echo $total;
                                                            @endphp
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="payment-method">
                                            <div class="pm-item">
                                                <input type="radio" name="pm" id="one">
                                                <label for="one">Paypal</label>
                                            </div>
                                            <div class="pm-item">
                                                <input type="radio" name="pm" id="two">
                                                <label for="two">Cash on delievery</label>
                                            </div>
                                            <div class="pm-item">
                                                <input type="radio" name="pm" id="three">
                                                <label for="three">Credit card</label>
                                            </div>
                                            <div class="pm-item">
                                                <input type="radio" name="pm" id="four" checked>
                                                <label for="four">Direct bank transfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ url('order/place/stripe/view')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="total_amount" value="{{$total}}">
                                        <button type="submit"  class="site-btn btn-full">Place Order</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        

        <!-- Page -->
        
        <!-- Page -->

@endsection

@section('footerSection')

    <script>
           $(document).ready(function(){
                $('#country_list').change(function(){
                    var country_id = $(this).val();
                    // alert(country_id);
                    // ===== ajax setup
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    // ====== ajax setup end
                    $.ajax({
                        type: 'POST',
                        url: '/get/city/list',
                        data: {country_id: country_id},
                        success: function(data){
                            //alert(data);
                            $('#city_list').html(data)
                        }
                    });
                }); 
           });
    </script>


@endsection