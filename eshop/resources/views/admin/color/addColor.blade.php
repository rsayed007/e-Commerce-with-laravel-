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
						<div class="col-md-6 col-md-offset-3 text-center">
                            <form action="{{ url('admin/colors/insert') }}" method="POST" class="input-form">
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
									<label >Color Name</label>
									<input type="text" class="form-control" name='color_name' id="color_name" value="">
                                </div>
                                <div class="form-group">
									<label >Color Code</label>
									<input type="text" class="form-control" name='color_code' id="color_code" value="">
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
		<section class="content">

			<!-- Default box -->
			<div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">All Colors</h3>
  
				<div class="box-tools pull-right">
				  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
				</div>
			  </div>
			  <div class="box-body cal-md-6">
                <table class="table table-bordered table-striped text-center">
                        <thead>
                          <tr>
                            <th>S.N</th>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $color->color_name}}</td>
                                    <td>{{ $color->color_code}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                        <a href="{{ url('admin/delete/color') }}/{{$color->id}}" class="btn btn-danger btn-sm">Delete </a>
                                            <a href="" class="btn btn-warning btn-sm">Edit </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                      {{ $colors->links()}}

                    </div>
			  
			  <!-- /.box-footer-->
			</div>
			<!-- /.box -->
  
		  </section>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
@endsection