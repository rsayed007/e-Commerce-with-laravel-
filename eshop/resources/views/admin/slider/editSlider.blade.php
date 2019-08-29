@extends('admin.layouts.app')

@section('main-content')
 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Add Slider
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
	          <h3 class="box-title">Add Product</h3>

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
						<form action="{{url('/admin/update/slider')}}" method="POST"  enctype="multipart/form-data">
							@csrf

							{{-- error massege --}}
							@if ($errors->all())
								<div class="alert alert-danger text-center">
									<p>Error ache</p>
								</div>
							@endif
                                <input type="hidden"  name='slider_id' id="slider_id" value="{{ $editInfo->id }}">
                                
                                <div class="form-group">
								<label >Slider Name</label>
								<input type="text" class="form-control" name='slider_name' id="slider_name" value="{{ $editInfo->slider_name }}">
								</div>
								<div class="form-group">
								<label >Product price</label>
								<input type="number" class="form-control" name='slider_price' id="slider_price" value="{{ $editInfo->slider_price }}">
								</div>
								<div class="form-group">
								<label >Collecton </label>
								<textarea class="form-control"  name='slider_description' id="slider_description">{{ $editInfo->slider_description }} </textarea>
								</div>
								<div class="form-group">
                                    <label >Collecton Year</label>
                                    <input type="number" class="form-control" name='collection_year' id="slilder_quantity" value="{{ $editInfo->collection_year }} ">
                                </div>
								<div class="form-group">
                                    <label >Button Name</label>
                                    <input type="text" class="form-control" name='button_name' id="button_name" value=" {{ $editInfo->button_name }} ">
                                </div>
								<div class="form-group">
                                    <label >Button Link</label>
                                    <input type="text" class="form-control" name='button_link' id="button_link" value="{{ $editInfo->button_link }} ">
                                </div>
                            <div class="form-group">
									<label >Slilder Image</label>
									<input type="file" class="form-control" name='slider_image' id="slider_image" >
								</div>
								<button type="submit" class="btn btn-success">Submit</button>
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