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
@if ($errors->has('logo'))
    <script> toastr.error("The logo should be .jpg, .jpeg or .png","Error")</script>
 @endif 
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            School Manage
            <small>Update School</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/schools') }}">School Manage</a></li>
            <li class="active">Update School</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <form method="POST" action="{{ URL::to('admin/schools/'. $result->id) }}" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{ method_field('PUT')}}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Update School</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Full Name" name="name" type="text" id="first_name" value="@if(isset($result->users->fName)){{$result->users->fName}} {{$result->users->lName}}@endif ">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" placeholder="Address" name="address" type="text"  value="@if(isset($result->address)){{$result->address}}@endif ">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">About</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" required placeholder="About" name="about">@if(isset($result->about)){{$result->about}}@endif </textarea>
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">City</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="City" name="city" type="text" value="@if(isset($result->city)){{$result->city}}@endif ">
                        </div>
                        <!--col-lg-10-->
                    </div>                   
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">State</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="State" name="state" type="text" value="@if(isset($result->state)){{$result->state}}@endif ">
                        </div>
                       
                    </div>                   
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Zip</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="Zip" name="zip" type="number" value="@if(isset($result->zip)){{(int)$result->zip}}@endif">
                        </div>
                       
                    </div>
                    <!--form control-->
                                     
                   

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    <a href="{{url('admin/schools')}}"  class="btn btn-default">Cancel</a>
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