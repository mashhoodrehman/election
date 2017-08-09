@extends('Admin.layout')
@section('content')
@if ($errors->has('import_file'))
    <script> toastr.error("Error file uploading!","Error")</script>
 @endif 
<div class="content-wrapper" style="min-height: 289px;">
<section class="content-header">
      <h1>
       CSV Import
        <small>import</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Teacher CSV	</li>
      </ol>
    </section>
    <section class="content">
		<div class="box box-info">
	            <div class="box-header">
	              <h3 class="box-title">Teachers CSV</h3>
	            </div>
	            <div class="box-body">
	         		<form  action="{{ URL::to('importTeacher') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="">
							<label for="exampleInputFile">File input</label>
							<input type="file" name="import_file" required>
							<p class="help-block">*Select CSV files only. Click <a href="{{url('assets/files/example.csv')}}" download>here</a> to see example file.</p>
							
							{{csrf_field()}}
						</div>					
						<button class="btn btn-primary pull-right">Import File</button>
					</form> 	            		
	            	
	           
           
	            </div>
	            <!-- /.box-body -->
	    </div>    	
    </section>
    

{!! Toastr::render() !!}
</div>
@endsection