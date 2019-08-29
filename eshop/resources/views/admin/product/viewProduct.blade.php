@extends('admin.layouts.app')

@section('main-content')
 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Add Products
	        <small>it all starts here</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Examples</a></li>
	        <li class="active">Blank page</li>
	      </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">

	      <!-- Default box -->
	      <div class="box">
	        <div class="box-header with-border">
			  <h3 class="box-title"> Product list</h3>
			  @if (session('status'))
			  	<div class="alert alert-success text-center">
					{{ session('status')}}
				</div>
			  @endif
				
	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	              <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	              <i class="fa fa-times"></i></button>
	          </div>
			</div>
			<div class="box-body">
				<div class="container">
					<div class="row">
						<div class="col-md-10 ">
							<table class="table table-hover">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Product Name</th>
											<th>Product Image</th>
											<th>Product Description</th>
											<th>Created at</th>
											<th>Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($products as $product)
											<tr>
												<td>{{ $loop->index + 1 }}</td>
												<td>{{title_case($product->product_name)}}</td>
												<td>
													<img  src="{{ asset('uploads/image/product/product_image')}}/{{ $product->product_image }}" alt="photo" width="90px">
												</td>
												<td>{{Str::limit($product->product_description, 20)}}</td>
												<td>{{$product->created_at->diffForHumans()}}</td>
												<td>{{$product->product_price}}</td>
												<td>
													<div class="btn-group" role="group">
														<a href="{{ url('/admin/delete/product')}}/{{$product->id}}" class="btn btn-danger btn-sm">Delete </a>
                                                        <a href="{{ url('/admin/edit/product/')}}/{{$product->id}}" class="btn btn-warning btn-sm">Edit </a>
													</div>
												</td>
											@empty
												<td class="text-center" colspan="6">No Data Availavle</td>
											</tr>
												
										
										@endforelse
										
									</tbody>
							</table>
							{{ $products->links()}}
						</div>
					</div>
				</div>
	        </div>
	        <!-- /.box-body -->
	        
	      </div>
	      <!-- /.box -->

		</section>
		<section class="content">

			<!-- Default box -->
			<div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">Title</h3>
  
				<div class="box-tools pull-right">
				  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
				</div>
			  </div>
			  <div class="box-body">
					<div class="container">
						<div class="row">
							<div class="col-md-10 ">
								<table class="table table-hover">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Product Name</th>
												<th>Product Image</th>
												<th>Product Description</th>
												<th>Price</th>
												<th>Action</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($deleted_products as $deleted_product)
												<tr>
													<td>{{ $loop->index + 1 }}</td>
													<td>{{title_case($deleted_product->product_name)}}</td>
													<td>
														<img  src="{{ asset('uploads/image/product/product_image')}}/{{ $deleted_product->product_image }}" alt="photo" width="90px">
													</td>
													<td>{{Str::limit($deleted_product->product_description, 20)}}</td>
													<td>{{$deleted_product->product_price}}</td>
													<td>
														<div class="btn-group" role="group">
															<a href="{{ url('/admin/restore/product')}}/{{$deleted_product->id}}" class="btn btn-info btn-sm">Restor </a>
															<button  class="btn btn-danger btn-sm final_delete_btn" value='{{ url('/admin/finalDelete/product')}}/{{$deleted_product->id}}' >Delete </button>
														</div>
													</td>
												@empty
													<td class="text-center" colspan="6">No Data Availavle</td>
												</tr>
													
											
											@endforelse
											
										</tbody>
								</table>
								{{ $products->links()}}
							</div>
						</div>
					</div>
				</div>
			  
			  <!-- /.box-footer-->
			</div>
			<!-- /.box -->
  
		  </section>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
@endsection

@section('footerSection')
<script>

	$(document).ready(function(){
		$('.final_delete_btn').click(function(){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					window.location.href = $(this).val();
				}

			})
		});
	});
  </script>
@endsection