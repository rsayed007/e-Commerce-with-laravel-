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
                                @if (App\CustomerInfo::where('user_id', Auth::id())->exists())
                                @php
                                    $old_UserInfo = App\CustomerInfo::where('user_id', Auth::id())->first()
                                @endphp

                                    <form action="{{url('customer/profile/update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label >First Name</label>
                                                <input type="hidden" class="form-control" name='user_id' id="user_id" value="{{Auth::id()}}">
                                                <input type="text" class="form-control" name='first_name' id="first_name" required value="{{$old_UserInfo->first_name}}">
                                            </div>
                
                                            <div class="form-group">
                                                <label >Last Name</label>
                                                <input type="text" class="form-control" name='last_name' id="last_name" required value="{{$old_UserInfo->last_name}}">
                                            </div>
                
                                            <div class="form-group">
                                                <label >Address</label>
                                                <input type="text" class="form-control" name='address' id="address" required value="{{$old_UserInfo->address}}">
                                            </div>
                
                                            <div class="form-group">
                                                <label >Zip Code</label>
                                                <input type="text" class="form-control" name='zip_code' id="zip_code"  value="{{$old_UserInfo->zip_code}}">
                                            </div>
                                            <div class="form-group">
                                                <label >phone</label>
                                                <input type="text" class="form-control" name='phone' id="phone" required value="{{$old_UserInfo->phone}}">
                                            </div>
                                            
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </form> 
                                @else
                                    <form action="{{url('customer/profile/insert')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label >First Name</label>
                                                <input type="hidden" class="form-control" name='user_id' id="user_id" value="{{Auth::id()}}">
                                                <input type="text" class="form-control" name='first_name' id="first_name" required value="">
                                            </div>
                
                                            <div class="form-group">
                                                <label >Last Name</label>
                                                <input type="text" class="form-control" name='last_name' id="last_name" required value="">
                                            </div>
                
                                            <div class="form-group">
                                                <label >Address</label>
                                                <input type="text" class="form-control" name='address' id="address" required value="">
                                            </div>
                
                                            <div class="form-group">
                                                <label >Zip Code</label>
                                                <input type="text" class="form-control" name='zip_code' id="zip_code"  value="">
                                            </div>
                                            <div class="form-group">
                                                <label >phone</label>
                                                <input type="text" class="form-control" name='phone' id="phone" required value="">
                                            </div>
                                            
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form> 
                                @endif
                                    
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
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="{{url('/admin/insert/product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label >First Name</label>
                                <input type="text" class="form-control" name='product_name' id="product_name" value="">
                            </div>

                            <div class="form-group">
                                <label >Last Name</label>
                                <input type="text" class="form-control" name='product_name' id="product_name" value="">
                            </div>

                            <div class="form-group">
                                <label >Address</label>
                                <input type="text" class="form-control" name='product_name' id="product_name" value="">
                            </div>

                            <div class="form-group">
                                <label >Zip Code</label>
                                <input type="text" class="form-control" name='product_name' id="product_name" value="">
                            </div>
                            <label class="form-group">
                                <label >Phone</label>
                                <input type="text" class="form-control" name='product_name' id="product_name" value="">
                            </div>
                            <div class="form-group">
                                <label >Zip Code</label>
                                <input type="text" class="form-control" name='product_name' id="product_name" value="">
                            </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
        </div> --}}