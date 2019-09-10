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
	          <h3 class="box-title">Add Color</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i>
                </button>
	          </div>
			</div>
			<div class="box-body">
				<div class="container">
					<div class="row">
						<div class="col-md-6  text-center">
					
							<table class="table table-bordered table-striped text-center">
									<thead>
									<tr>
									<th>S.N</th>
									<th>Coupon Name</th>
									<th> Amount</th>
									<th>Date</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($coupons as $coupon)
										<tr>
											<td>{{ $loop->index + 1 }}</td>
											<td>{{ $coupon->coupon_name}}</td>
											<td>{{ $coupon->coupon_amount}}</td>
											<td>{{ $coupon->valid_date}}</td>
											<td>
												<div class="btn-group" role="group">
													<a href="{{ url('admin/delete/color') }}/{{$coupon->id}}" class="btn btn-danger btn-sm">Delete </a>
												</div>
											</td>
										</tr>
									@endforeach
									
								</tbody>
							</table>
								{{-- {{ $colors->links()}} --}}
		
                        </div>
						<div class="col-md-3  text-center">
                            <form action="{{ url('coupon/create') }}" method="POST" class="input-form">
                                @csrf
                                {{-- error massege --}}
                                @if ($errors->all())
                                    <div class="alert alert-danger text-center">
                                        <p>Error ache</p>
                                    </div>
                                @endif
                                @if (session('status'))
                                    <div class="alert alert-success text-center">
                                        {{ session('status')}}
                                    </div>
                                @endif
                                <div class="form-group">
									<label >Coupon Name</label>
									<input type="text" class="form-control" name='coupon_name' id="coupon_name" value="">
                                </div>
                                <div class="form-group">
									<label >Valid Date</label>
									<input type="date" class="form-control" name='valid_date' id="valid_date" value="">
                                </div>
                                <div class="form-group">
									<label >Amounte </label>
									<input type="number" class="form-control" name='coupon_amount' id="coupon_amount" value="">
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