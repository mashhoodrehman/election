@extends('Admin.layout')
@section('content')

<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php if($user->role=="student" || $user->role=="parent"){?>
            User Manage
            <small>Edit User</small>
            <?php }?>
            <?php if($user->role=="admin"){?>
            Admin
            <small>Edit Admin</small>
            <?php }?>
        </h1>
        <ol class="breadcrumb">
        <?php if($user->role=="student" || $user->role=="parent"){?>
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/user') }}">User Manage</a></li>
            <li class="active">Edit User</li>
            <?php }?>

            <?php if($user->role=="admin"){?>
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/user') }}">User Management</a></li>
            <li class="active">Edit Admin</li>
            <?php }?>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <form method="POST" action="{{ URL::to('admin/user/' . $user->id) }}" accept-charset="UTF-8" class="form-horizontal" role="form">
            <input name="_token" type="hidden" value="{{csrf_token()}}">

            {{ method_field('PUT')}}
            <div class="box box-success">
                <div class="box-header with-border">
                <?php if($user->role=="student" || $user->role=="parent"){?>
                    <h3 class="box-title">Edit User</h3>
                    <?php }?>
                    <?php if($user->role=="admin"){?>
                    <h3 class="box-title">Edit Admin</h3>
                    <?php }?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Full Name" name="fName" type="text" id="first_name" value="{{$user->fName}}">
                        </div>
                        <!--col-lg-10-->
                    </div>

                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Full Name" name="lName" type="text" id="first_name" value="{{$user->lName}}">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">E-mail</label>
                        <div class="col-lg-10">
                            <input class="form-control" required="required" placeholder="Address" name="email" type="text" id="last_name" value="{{$user->email}}">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                        <input class="form-control" required="required" placeholder="Password" name="password" type="password" id="last_name" value="{{$user->password}}">
                        </div>
                        <!--col-lg-10-->
                    </div>
                    <!--form control-->
                                       
                    
                    <!--form control-->
                    <div class="form-group">
                

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
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}
@endsection