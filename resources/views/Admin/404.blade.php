@extends('Admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 289px;">
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
</section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
      <div class="error-page">
              <h2 class="headline text-yellow"> 404</h2>

              <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

                <p>
                  We could not find the page you were looking for.
                  Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
                </p>

              </div>
              <!-- /.error-content -->
            </div>
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}

@endsection