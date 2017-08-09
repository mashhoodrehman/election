@extends('Admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            election Manage
            <small>View election</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/elections') }}">election Manage</a></li>
            <li class="active">View election</li>
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
              <h3 class="box-title">election Detail</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">

                @if(isset($election->image))
                
                 <img class="profile-user-img img-responsive view_image" src="/uploads/election_imgs/@if(isset($election->image)){{$election->image}}@endif" alt="election image" >
                @else
                <img class="profile-user-img img-responsive  view_image" src="/assets/img/user.jpg" alt="school logo">                            
                @endif
            <div class="row">
                <div class="col-sm-6">
              <strong></i> id</strong>
                <p class="text-muted">
                    {{$election->id}}
                </p>
                <hr>
              <strong> Start Date</strong>
                <p class="text-muted">
                    {{$election->election_Date}}
                </p>
                <hr>
              <strong> Start Time</strong>
                <p class="text-muted">
                    {{$election->start_Time}}
                </p>
                <hr>
              <strong> End Time</strong>
                <p class="text-muted">
                    {{$election->end_Time}}
                </p>                    
                </div>
                
               
              
                </div> 
                        
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