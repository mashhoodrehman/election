<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">


  <!-- Font Awesome -->
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css" rel="stylesheet">
 
 
  <!-- Theme style -->
  <link href="{{ asset('assets/css/AdminLTE.min.css') }}" rel="stylesheet">
 

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{ asset('assets/css/skins/_all-skins.min.css') }}" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/sweetalert.css') }}">
  
  <link href="{{ asset('assets/css/custom.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('assets/plugins/froala/froala_editor.pkgd.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('assets/plugins/froala/froala_style.min.css') }}" type="text/css" rel="stylesheet">
{{--   <link href="{{ asset('assets/plugins/ckeditor/contents.css') }}" type="text/css" rel="stylesheet"> --}}
   
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('assets/dist/sweetalert.min.js') }}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <header class="main-header">

    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin </b>Panel</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">{{Auth::user()->fName}} {{Auth::user()->lName}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                

                <p>
                  {{Auth::user()->fName}} {{Auth::user()->lName}}
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- admin/user/<?php echo Auth::user()->id;?>/edit -->
                  <a href="{{url('admin/user').'/'.Auth::user()->id.'/edit'}}" class="btn btn-default btn-flat">Profile</a>

                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <p style="color: white">{{Auth::user()->fName}} {{Auth::user()->lName}}</p>
        <div class="" style="">
          
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header {{ Request::path() == 'admin' ? 'active' : '' }} ">
          <a href="{{ url('admin/dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ Request::path() == 'admin/addusers' || Request::path() == 'admin/user'  ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class=" {{ Request::path() == 'admin/addusers' ? 'active' : '' }}"><a href="{{ url('/admin/addusers') }}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li  class=" {{ Request::path() == 'admin/user' ? 'active' : '' }}"><a href="{{ url('/admin/user') }}"><i class="fa fa-circle-o"></i>Manage</a></li>

          </ul>
        </li>
        <li class="{{ Request::path() == 'admin/voters' ||Request::path() == 'admin/addvoter'  ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-university"></i> <span>voters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ Request::path() == 'admin/addvoter' ? 'active' : '' }}"><a href="{{ url('/admin/addvoter') }}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li  class="{{ Request::path() == 'admin/voters' ? 'active' : '' }}"><a href="{{ url('/admin/voters') }}"><i class="fa fa-circle-o"></i>Manage</a></li>
          </ul>
        </li>
        <li class="{{ Request::path() == 'admin/candidates' ||Request::path() == 'admin/addcandidate'  ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>candidates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/addcandidate' ? 'active' : '' }}"><a href="{{ url('/admin/addcandidate') }}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li class="{{ Request::path() == 'admin/candidates' ? 'active' : '' }}"><a href="{{ url('/admin/candidates') }}"><i class="fa fa-circle-o"></i>Manage</a></li>
            

          </ul>
        </li>
         <li class="{{ Request::path() == 'admin/addElection' ||Request::path() == 'admin/addcandidate'  ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>election</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/addElection' ? 'active' : '' }}"><a href="{{ url('/admin/addElection') }}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li class="{{ Request::path() == 'admin/candidates' ? 'active' : '' }}"><a href="{{ url('/admin/electionManage') }}"><i class="fa fa-circle-o"></i>Manage</a></li>
            

          </ul>
        </li>

        <li class="{{ Request::path() == 'admin/questions' ||Request::path() == 'admin/addquestions'  ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-question"></i> <span>Questions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ Request::path() == 'admin/addquestions' ? 'active' : '' }}"><a href="{{ url('admin/addquestions') }}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li class="{{ Request::path() == 'admin/questions' ? 'active' : '' }}"><a href="{{ url('admin/questions') }}"><i class="fa fa-circle-o"></i>Manage</a></li>

            

          </ul>
        </li>

        <li class="{{ Request::path() == 'candidates' ||Request::path() == 'addcandidate'  ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <li class="{{ (strpos( Request::path(), 'admin/user')) ? 'active' : '' }}"><a href="/admin/user/{{Auth::user()->id}}/edit"><i class="fa fa-circle-o"></i>Change Password</a></li>
          </ul>
        </li>

        <li class="{{ Request::path() == 'admin/candidate' ||Request::path() == 'admin/voter'  ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-file-excel-o"></i> <span>Import</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/candidate' ? 'active' : '' }}"><a href="{{ url('/admin/candidate') }}"><i class="fa fa-circle-o"></i>Import candidates</a></li>
            <li class="{{ Request::path() == 'admin/voter' ? 'active' : '' }}"><a href="{{ url('/admin/voter') }}"><i class="fa fa-circle-o"></i>Import voters</a></li>
            

          </ul>
        </li>
        <li class="{{ Request::path() == 'admin/policy' ||Request::path() == 'admin/terms'  ? 'active' : ''||Request::path() == 'admin/faqs'  ? 'active' : '' }}  treeview">
          <a href="#">
            <i class="fa fa-paragraph"></i> <span>Contents</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'admin/policy' ? 'active' : '' }}"><a href="{{ url('/admin/policy') }}"><i class="fa fa-circle-o"></i>Privacy Policy</a></li>
            <li class="{{ Request::path() == 'admin/terms' ? 'active' : '' }}"><a href="{{ url('/admin/terms') }}"><i class="fa fa-circle-o"></i>Terms of use</a></li>            
            <li class="{{ Request::path() == 'admin/faqs' ? 'active' : '' }}"><a href="{{ url('/admin/faqs') }}"><i class="fa fa-circle-o"></i>FAQs</a></li>
            

          </ul>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
@yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.0 -->
    </div>
    <strong>Copyright &copy; 2017 <a href="{{ url('admin/dashboard') }}">Teaching Side By Side</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


</div>
<!-- ./wrapper -->



<!-- AdminLTE App -->


<script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
<!-- <script src="{{ asset('assets/js/pages/dashboard2.js') }}"></script> -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/plugins/froala/froala_editor.pkgd.min.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/plugins/ckeditor/config.js') }}"></script>
<script src="{{ asset('assets/plugins/ckeditor/styles.js') }}"></script> --}}


</body>
</html>
