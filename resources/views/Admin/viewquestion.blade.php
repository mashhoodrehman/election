@extends('Admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question Manage
            <small>View Question</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}">Dashboard</a></li>
            <li><a href="{{url('admin/questions')}}">Question View</a></li>
            <li class="active">View Question</li>
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
              <h3 class="box-title">Question Detail</h3>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                      <strong></i> Question</strong>
                        <p class="text-muted">
                            {{$question->question}}
                        </p>
                        <hr>
                        @foreach($answer as $data)
                       
                        <p class="text-muted">
                           <strong>Answer:</strong>&nbsp;&nbsp;&nbsp;{{$data->answer}}&nbsp;&nbsp;&nbsp;<strong>Weight:</strong>&nbsp;&nbsp;&nbsp;{{$data->weight}}%
                        </p>
                        <hr>
                        @endforeach                                           
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