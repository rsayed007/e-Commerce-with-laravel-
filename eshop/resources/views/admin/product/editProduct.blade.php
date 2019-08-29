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
	          <h3 class=" text-center">Edite ' {{ $editInfo->product_name}} ' Info</h3>

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
						<div class="col-md-6 col-md-offset-3">
						<form action="{{url('/admin/update/product')}}" method="POST">
							@csrf

							{{-- error massege --}}
							@if ($errors->all())
								<div class="alert alert-danger text-center">
									<p>Error ache</p>
								</div>
							@endif
                            <input type="hidden"  name='product_id' id="product_id" value="{{ $editInfo->id }}">
                            
                            <div class="form-group">
								<label >Product Name</label>
								<input type="text" class="form-control" name='product_name' id="product_name" value="{{ $editInfo->product_name }}">
								</div>
								<div class="form-group">
								<label >Product price</label>
								<input type="number" class="form-control" name='product_price' id="product_price" value="{{ $editInfo->product_price }}">
								</div>
								<div class="form-group">
								<label >Product Description</label>
								<textarea class="form-control"  name='product_description' id="product_description">{{ $editInfo->product_description }} </textarea>
								</div>
								<div class="form-group">
								<label >Product Quantity</label>
								<input type="number" class="form-control" name='product_quantity' id="product_quantity" value="{{ $editInfo->product_quantity }}">
								</div>
								<div class="form-group">
								<label >Alert Quantity</label>
								<input type="NUMBER" class="form-control" name='alert_quantity' id="alert_quantity" value="{{ $editInfo->alert_quantity }}">
								</div>
								{{-- <div class="form-group">
									<label >Product Image</label>
									<input type="file" class="form-control" name='product_image' id="product_image" >
								</div> --}}
								<button type="submit" class="btn btn-success">Update</button>
							</form> 
						</div>
					</div>
				</div>
	        </div>
	        <!-- /.box-body -->
	        
	      </div>
	      <!-- /.box -->

		</section>
    </div>
	  <!-- /.content-wrapper -->
@endsection