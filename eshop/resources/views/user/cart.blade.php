@extends('user/layouts/app')

@section('main_user_content')


	<!-- Page Info -->
	<div class="page-info-section page-info">
            <div class="container">
                
                <div class="site-breadcrumb">
                    <a href="">Home</a> / 
                    <a href="">Sales</a> / 
                    <a href="">Bags</a> / 
                    <span>Cart</span>
                </div>
            <img src="{{ asset('user/img/page-info-art.png')}}" alt="" class="page-info-art">
            </div>
        </div>
        <!-- Page Info end -->
    
    
        <!-- Page -->
        <div class="page-area cart-page spad">
            <div class="container">
                    @if ($errors->all())
                        <div class="alert alert-danger text-center">
                            <p>{{$errors}}</p>
                        </div>
                    @endif
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-th">Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="total-th">Total</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subTotal = 0
                            @endphp
                            @foreach ($cart_items as $cart_item)
                                <tr>
                                <td class="product-col">
                                    <img src="{{ asset('uploads/image/product/product_image')}}/{{ $cart_item->RelationWithProductTable->product_image}}"  alt="{{ $cart_item->RelationWithProductTable->product_image}}">
                                    <div class="pc-title">
                                        {{-- with out relation, direct from table --}}
                                        {{-- <h4>{{ App\Product::find($cart_item->product_id)->product_name}}</h4> --}}
                                        
                                        {{-- good practice  --}} 
                                        <h4>{{ $cart_item->RelationWithProductTable->product_name}}</h4>
                                        <a href="#">{{ $cart_item->RelationWith_SizeTable->size }}/</a>
                                        <a href="#">{{ $cart_item->RelationWithColorTable->color_name }}</a>
                                    </div>
                                </td>
                                <td class="price-col">${{ $cart_item->RelationWithProductTable->product_price}}</td>
                                <td class="quy-col">
                                    <div class="quy-input">
                                        <span>Qty</span>
                                        <input type="number" value="{{ $cart_item->product_quentity}}">
                                    </div>
                                </td>
                                <td class="total-col">${{ $cart_item->RelationWithProductTable->product_price * $cart_item->product_quentity}} </td>
                                <td class="total-col"> <a href="{{url('/cart/view/delete')}}/{{$cart_item->id}}" class="btn btn-danger">Delete</a> </td>
                            </tr>
                            @php
                                $subTotal +=  $cart_item->RelationWithProductTable->product_price * $cart_item->product_quentity;
                            @endphp
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="row cart-buttons">
                    <div class="col-lg-5 col-md-5">
                        <div class="site-btn btn-continue">Continue shooping</div>
                    </div>
                    <div class="col-lg-7 col-md-7 text-lg-right text-left">
                        <div class="site-btn btn-clear">Clear cart</div>
                        <div class="site-btn btn-line btn-update">Update Cart</div>
                    </div>
                </div>
            </div>
            <div class="card-warp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="shipping-info">
                                <h4>Shipping method</h4>
                                <p>Select the one you want</p>
                                <div class="shipping-chooes">
                                    <div class="sc-item">
                                        <input type="radio" name="sc" id="one">
                                        <label for="one">Next day delivery<span id="one_value">4.99</span> <span>$</span> </label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" name="sc" id="two">
                                        <label for="two">Standard delivery<span id="two_value">1.99</span><span>$</span></label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" name="sc" id="three">
                                        <label for="three" checked>Personal Pickup<span id="three_value">Free</span></label>
                                    </div>
                                </div>
                                <h4>Cupon code</h4>
                                <p>Enter your cupone code</p>

                                    <div class="cupon-input">
                                        <input type="text" id="coupon_field" value="">
                                        <button class="site-btn" id="coupon_btn">Apply</button>
                                    </div>

                            </div>
                        </div>
                        <div class="offset-lg-2 col-lg-6">
                            <div class="cart-total-details">
                                <h4>Cart total</h4>
                                <p>Final Info</p>
                                <ul class="cart-total-card">
                                    <li>Subtotal<span>$ {{$subTotal }}</span></li>
                                    <li>Discount (%)<span>{{ $coupon_amount }}</span></li>
                                    <li>Shipping<span id="shipping_cost">Free</span></li>
                                    <li class="d-none" >Total<span id="total_amount_dami">{{ ($subTotal-($subTotal*$coupon_amount)/100) }}</span><span>$</span></li>
                                    <li class="total">Total<span id="total_amount">{{ ($subTotal-($subTotal*$coupon_amount)/100) }}</span><span>$</span></li>
                                </ul>
                                <a class="site-btn btn-full" href="checkout.html">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end -->
    
	
@endsection

@section('footerSection')
    <script>
        $(document).ready(function(){
            $('#coupon_btn').click(function(){
                // alert($('#coupon_field').val());
                 var coupon_name = $('#coupon_field').val();
                window.location.href = coupon_name;
            });
            $('#one').click(function(){
                $('#shipping_cost').html($('#one_value').html())
                var total_amount    = parseFloat($('#total_amount_dami').html())
                var one_value       = parseFloat($('#one_value').html())
                var new_total       = total_amount + one_value;
                $('#total_amount').html(new_total)
                
            });
            $('#two').click(function(){
                $('#shipping_cost').html($('#two_value').html())
                var total_amount    = parseFloat($('#total_amount_dami').html())
                var two_value       = parseFloat($('#two_value').html())
                var new_total       = total_amount + two_value;
                $('#total_amount').html(new_total)
                
            });
            $('#three').click(function(){
                $('#shipping_cost').html(0)
                var total_amount    = parseFloat($('#total_amount').html())
                var new_total       = total_amount + 0;
                $('#total_amount').html(new_total)
                
            });
        });
    
    </script>
@endsection