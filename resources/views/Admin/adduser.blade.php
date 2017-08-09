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
            User Manage
            <small>Create User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/user') }}">User Manage</a></li>
            <li class="active">Create User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <form method="POST" action="{{ url('admin/user') }}" class="form-horizontal"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add User</h3>
                        
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Full Name" name="fName" type="text" id="first_name">
                        </div>

                        <!--col-lg-10-->
                    </div>

                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Full Name" name="lName" type="text" id="first_name">
                        </div>

                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" placeholder="Address" name="email" type="text" id="last_name">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                  
                    <!--form control-->
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Pasword</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="Password" name="password" type="text" >
                        </div>
                        <!--col-lg-10-->
                    </div>                   
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Role</label>
                        <div class="col-xs-12 col-sm-4">
                            <select name="role" class="form-control">
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                            </select>
                        </div>
                       
                    </div>  
                    <input type="hidden" name="activate" value="1">                 
                   
                    <!--form control-->
                   

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    <a href="{{url('admin/user')}}"  class="btn btn-default">Cancel</a>
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