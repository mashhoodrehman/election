@extends('Admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Manage
            <small>View User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/user') }}">User Manage</a></li>
            <li class="active">View User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
    <div class="row">
        <div class="col-md-12">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Detail</h3>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
            <img class="profile-user-img img-responsive img-circle" src="../@if(isset($user->image)){{$user->image}}@endif" alt="school logo">
            <div class="row">
                <div class="col-sm-6">
              <strong></i> id</strong>
                <p class="text-muted">
                    {{$user->id}}
                </p>
                <hr>
              <strong> Name</strong>
                <p class="text-muted">
                    {{$user->name}}
                </p>
                <hr>
              <strong> Email</strong>
                <p class="text-muted">
                    {{$user->email}}
                </p>
                <hr>
              <strong> Role</strong>
                <p class="text-muted">
                    {{$user->role}}
                </p>                    



                
            <!-- /.box-body -->
          </div>            
        </div> 
        </div>
        </div>  
         <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">User's Feedback</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <!-- /.box tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                There is no Feedback for this type.
            </div>
            <!-- /.box-body -->
        </div>     
    </div>
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}
@endsection