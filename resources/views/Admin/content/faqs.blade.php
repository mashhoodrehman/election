

@extends('Admin.layout')
@section('content')
@if ($errors->has('faqs'))
    <script> toastr.error("Please Enter some text in Text Editor","Error")</script>
 @endif
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            FAQs
            <small>Add FAQs</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="active">FAQs</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->

            <div>
                <form method="POST" action="{{ url('admin/addfaqs') }}" class="form-horizontal"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <textarea id="texteditor3" rows="50" cols="200" name="faqs">@if(isset($data)){{$data}} @endif</textarea>
                <!-- /.box-header -->
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    <a href="{{url('admin/dashboard')}}"  class="btn btn-default">Cancel</a>
                    <input class="btn btn-success btn-md" type="submit" value="Save">                        
                    </div>
                </div>
                </form>                 
            </div>
            <!--box-->
  
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}
<script>
  $(function() {
    $('#texteditor3').froalaEditor({
         height: 300
    });
/*     CKEDITOR.replace( 'faqs' );*/
  });
</script>
@endsection