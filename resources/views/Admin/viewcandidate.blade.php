@extends('Admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            candidate Manage
            <small>View candidate</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/candidates') }}">candidate Manage</a></li>
            <li class="active">View candidate</li>
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
              <h3 class="box-title">candidate Detail</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">

                @if(isset($candidate->image))
                
                 <img class="profile-user-img img-responsive view_image" src="/uploads/candidate_imgs/@if(isset($candidate->image)){{$candidate->image}}@endif" alt="candidate image" >
                @else
                <img class="profile-user-img img-responsive  view_image" src="/assets/img/user.jpg" alt="school logo">                            
                @endif
            <div class="row">
                <div class="col-sm-6">
              <strong></i> id</strong>
                <p class="text-muted">
                    {{$candidate->id}}
                </p>
                <hr>
              <strong> Name</strong>
                <p class="text-muted">
                    {{$candidate->users->fName}} {{$candidate->users->lName}}
                </p>
                <hr>
              <strong> Address</strong>
                <p class="text-muted">
                    {{$candidate->address}}
                </p>
                <hr>
              <strong> City</strong>
                <p class="text-muted">
                    {{$candidate->city}}
                </p>                    
                </div>
                <div class="col-sm-6">
              <strong> State</strong>
                <p class="text-muted">
                    {{$candidate->state}}
                </p>
                <hr>
              <strong></i>Zip</strong>
                <p class="text-muted">
                    {{$candidate->zip}}
                </p>
                <hr>
              <strong>About</strong>
                <p class="text-muted">
                    {{$candidate->about}} 
                </p> 
              

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