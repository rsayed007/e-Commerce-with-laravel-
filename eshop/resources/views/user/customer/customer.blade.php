@extends('admin.layouts.app')

@section('main-content')
 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Blank page
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
	          <h3 class="box-title">Title</h3>
	        </div>
	        <div class="box-body">
              
              <table class="table table-hover">
				<thead>
				  <tr>
					<th>Product Name</th>
					<th>Size</th>
					<th>Color</th>
					<th>Amount</th>
					<th>Price</th>
				  </tr>
				</thead>
				<tbody>
					@foreach ($sales as $sale)
						{{ $sale }}
					<tr>
						<td>{{ App\Product::find($sale->product_id)->product_name  }}</td>
						<td>{{ App\Size::find($sale->size_id)->size  }}</td>
						<td>{{ App\Color::find($sale->color_id)->color_name  }}</td>
						<td>{{ $sale->product_quentity }}</td>
						<td>{{ $sale->product_price }}</td>
					</tr>

				  @endforeach
				</tbody>
			  </table>
	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer">
	          Footer
	        </div>
	        <!-- /.box-footer-->
	      </div>
	      <!-- /.box -->

	    </section>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
@endsection