@extends('Admin.layout')
@section('content')

 @if ($errors->has('name'))

    <script> toastr.error("The name field is required","Error")</script>
 @endif  
@if ($errors->has('email'))
    <script> toastr.error()</script>
 @endif  
@if ($errors->has('password'))
    <script> toastr.error("The password field is required","Error")</script>
 @endif  
@if ($errors->has('role'))
    <script> toastr.error("The role field is required","Error")</script>
 @endif


<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            election Manage
            <small>Create election</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/election') }}">election Manage</a></li>
            <li class="active">Create election</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <form method="POST" action="{{ url('admin/addelectiondata') }}" class="form-horizontal"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add election</h3>
                        
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Election Date</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Full Name" name="edate" type="date" id="first_name">
                        </div>

                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">Start Time</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" placeholder="Address" name="startTime" type="time" id="last_name">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                  
                    <!--form control-->
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">End Time</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" placeholder="Address" name="endTime" type="time" id="last_name">
                        </div>
                        <!--col-lg-10-->
                    </div>                   
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">Result</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" placeholder="Address" name="result" type="text" id="last_name">
                        </div>
                        <!--col-lg-10-->
                    </div> 
                    <input type="hidden" name="activate" value="1">                 
                   
                    <!--form control-->
                   

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    <a href="{{url('admin/election')}}"  class="btn btn-default">Cancel</a>
                    <input class="btn btn-success btn-md" type="submit" value="Save">                        
                    </div>
                </div>                 
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}
@endsection