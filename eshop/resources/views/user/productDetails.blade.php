@extends('user/layouts/app')

@section('main_user_content')



	<!-- Page Info -->
	<div class="page-info-section page-info">
			<div class="container">
				<div class="site-breadcrumb">
					<a href="">Home</a> / 
					<a href="">Sales</a> / 
					<a href="">Bags</a> / 
					<span>Shoulder bag</span>
				</div>
				<img src="{{ asset('user/img/page-info-art.png')}}" alt="" class="page-info-art">
			</div>
		</div>
		<!-- Page Info end -->
	
	
		<!-- Page -->
		<div class="page-area product-page spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<figure>
							<img class="product-big-img" src="{{ asset('uploads/image/product/product_image')}}/{{ $productInfo->product_image }}" alt="">
						</figure>
						<div class="product-thumbs">
							<div class="product-thumbs-track">
								<div class="pt" data-imgbigurl="img/product/1.jpg"><img src="{{ asset('uploads/image/product/product_image')}}/{{ $productInfo->product_image }}" alt=""></div>
								<div class="pt" data-imgbigurl="img/product/2.jpg"><img src="{{ asset('uploads/image/product/product_image')}}/{{ $productInfo->product_image }}" alt=""></div>
								<div class="pt" data-imgbigurl="img/product/3.jpg"><img src="{{ asset('uploads/image/product/product_image')}}/{{ $productInfo->product_image }}" alt=""></div>
								<div class="pt" data-imgbigurl="img/product/4.jpg"><img src="{{ asset('uploads/image/product/product_image')}}/{{ $productInfo->product_image }}" alt=""></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="product-content">
							
						<h2>{{ $productInfo->product_name}}</h2>
							<div class="pc-meta">
								<h4 class="price"> $ {{$productInfo->product_price}}</h4>
								<div class="review">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star is-fade"></i>
									</div>
									<span>(2 reviews)</span>
								</div>
							</div>
							<p>{{$productInfo->product_description}}</p>
							
						<form action="{{url('add/to/cart')}}" method="POST">
									@csrf
									<input type="hidden" name="product_id" value="{{$productInfo->id}}" >
								<div class="color-choose">
									<span>Colors:</span>
									@foreach (json_decode($productInfo->available_colors) as $available_color)
										@php
											$color_code = App\Color::find($available_color)->color_code;
											$color_name = App\Color::find($available_color)->color_name;
										@endphp
	{{-- for color control --}}
										<div class="cs-item">
											<input type="radio" name="cs" value="{{ $available_color}}" id="{{ $color_name }}-color">
											<label class="cs-{{ $color_name }}" for="{{ $color_name }}-color"></label>
										</div>
										<style>
											.product-content .color-choose label.cs-{{ $color_name }} {
												background: {{ $color_code }};
											}
											.product-content .color-choose label.cs-{{ $color_name }}:after {
												border: 1px solid {{ $color_code }};
											}
										</style>
									@endforeach

								</div>
{{-- for size control --}}
								<div class="size-choose">
									<span>Size:</span>
									@foreach (json_decode($productInfo->available_sizes) as $available_size)
									{{-- {{ $available_size}}
									{{ App\Size::find($available_size)->size}} --}}
									@php
										$size_name = App\Size::find($available_size)->size;
									@endphp
									<div class="sc-item">
										<input type="radio" name="sc" value="{{ $available_size}}" id="{{$size_name}}-size" >
										<label for="{{$size_name}}-size">{{$size_name}}</label>
									</div>
									@endforeach

								</div>
								<button type="submit" class="site-btn btn-line">ADD TO CART</button>
							</form>

						</div>
					</div>
				</div>
				<div class="product-details">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<ul class="nav" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
								</li>
							</ul>
							<div class="tab-content">
								<!-- single tab content -->
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
								</div>
								<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center rp-title">
					<h5>Related products</h5>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="product-item">
							<figure>
								<img src="img/products/1.jpg" alt="">
								<div class="pi-meta">
									<div class="pi-m-left">
										<img src="img/icons/eye.png" alt="">
										<p>quick view</p>
									</div>
									<div class="pi-m-right">
										<img src="img/icons/heart.png" alt="">
										<p>save</p>
									</div>
								</div>
							</figure>
							<div class="product-info">
								<h6>Long red Shirt</h6>
								<p>$39.90</p>
								<a href="#" class="site-btn btn-line">ADD TO CART</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-item">
							<figure>
								<img src="img/products/2.jpg" alt="">
								<div class="bache">NEW</div>
								<div class="pi-meta">
									<div class="pi-m-left">
										<img src="img/icons/eye.png" alt="">
										<p>quick view</p>
									</div>
									<div class="pi-m-right">
										<img src="img/icons/heart.png" alt="">
										<p>save</p>
									</div>
								</div>
							</figure>
							<div class="product-info">
								<h6>Hype grey shirt</h6>
								<p>$19.50</p>
								<a href="#" class="site-btn btn-line">ADD TO CART</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-item">
							<figure>
								<img src="img/products/3.jpg" alt="">
								<div class="pi-meta">
									<div class="pi-m-left">
										<img src="img/icons/eye.png" alt="">
										<p>quick view</p>
									</div>
									<div class="pi-m-right">
										<img src="img/icons/heart.png" alt="">
										<p>save</p>
									</div>
								</div>
							</figure>
							<div class="product-info">
								<h6>long sleeve jacket</h6>
								<p>$59.90</p>
								<a href="#" class="site-btn btn-line">ADD TO CART</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-item">
							<figure>
								<img src="img/products/4.jpg" alt="">
								<div class="bache sale">SALE</div>
								<div class="pi-meta">
									<div class="pi-m-left">
										<img src="img/icons/eye.png" alt="">
										<p>quick view</p>
									</div>
									<div class="pi-m-right">
										<img src="img/icons/heart.png" alt="">
										<p>save</p>
									</div>
								</div>
							</figure>
							<div class="product-info">
								<h6>Denim men shirt</h6>
								<p>$32.20 <span>RRP 64.40</span></p>
								<a href="#" class="site-btn btn-line">ADD TO CART</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
		<!-- Page end -->
	



		
@endsection