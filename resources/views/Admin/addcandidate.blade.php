@extends('Admin.layout')
@section('content')
@if ($errors->has('name'))
    <script> toastr.error("The name field is required","Error")</script>
 @endif  
@if ($errors->has('about'))
    <script> toastr.error("The about field is required","Error")</script>
 @endif  
@if ($errors->has('address'))
    <script> toastr.error("The address field is required","Error")</script>
 @endif  
@if ($errors->has('city'))
    <script> toastr.error("The city field is required","Error")</script>
 @endif  
@if ($errors->has('state'))
    <script> toastr.error("The state field is required","Error")</script>
 @endif  
@if ($errors->has('zip'))
    <script> toastr.error("The zip field is required","Error")</script>
 @endif  
@if ($errors->has('image'))
    <script> toastr.error("The logo is required. e.g(.jpg, .jpeg ,.png)","Error")</script>
 @endif 

<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            candidate Manage
            <small>Create candidate</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/candidates') }}">candidate Manage</a></li>
            <li class="active">Create candidate</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <form method="POST" action="{{ url('admin/candidates') }}" class="form-horizontal"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add candidate</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                           <select name="user">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->fName}} {{$user->lName}} & {{$user->email}}</option>
                            @endforeach
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" placeholder="Address" name="address" type="text" >
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">About</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" required placeholder="About" name="about"></textarea>
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">City</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="City" name="city" type="text" >
                        </div>
                        <!--col-lg-10-->
                    </div>                   
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">State</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="State" name="state" type="text" >
                        </div>
                       
                    </div>                   
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Zip</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="Zip" name="zip" type="number" >
                        </div>
                       
                    </div>                   
                   
                    <!--form control-->
                    

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    <a href="{{url('admin/candidates')}}"  class="btn btn-default">Cancel</a>
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