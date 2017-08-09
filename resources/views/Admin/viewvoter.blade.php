@extends('Admin.layout')
@section('content')

@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            voter Manage
            <small>View voter</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/voters') }}">voter Manage</a></li>
            <li class="active">View voter</li>
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
              <h3 class="box-title">voter Detail</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">


            <div class="row">
                <div class="col-sm-6">
              <strong></i> id</strong>
                <p class="text-muted">
                    {{$voter->id}}
                </p>
                <hr>
              <strong> Name</strong>
                <p class="text-muted">
                    {{$voter->users->fName}} {{$voter->users->lName}}
                </p>
                <hr>
              <strong> Address</strong>
                <p class="text-muted">
                    {{$voter->address}}
                </p>
                <hr>
              <strong> City</strong>
                <p class="text-muted">
                    {{$voter->city}}
                </p>                    
                </div>
                <div class="col-sm-6">
              <strong> State</strong>
                <p class="text-muted">
                    {{$voter->state}}
                </p>
                <hr>
              <strong></i>Zip</strong>
                <p class="text-muted">
                    {{$voter->zip}}
                </p>
                <hr>
              <strong>About</strong>
                <p class="text-muted">
                    {{$voter->about}}
                </p>                        
                </div>
            </div>



                
            <!-- /.box-body -->
          </div>            
        </div>        
    </div>
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}
@endsection