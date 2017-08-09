@extends('Admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 288px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question Manage
            <small>Update Question</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/questions') }}">Question Manage</a></li>
            <li class="active">Update Question</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <form method="POST" action="{{ URL::to('admin/questions/'.$result->id) }}" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{ method_field('PUT')}}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Question</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">Question</label>
                        <div class="col-lg-10">
                            <input class="form-control"  required="required" autofocus="autofocus" placeholder="Add Question" name="question" type="text" value="@if(isset($result->question)){{$result->question}}@endif ">
                            @if ($errors->has('question'))
                                <div class="error_msg">{{ $errors->first('question') }}</div>
                                <script> toastr.error("The Question field is required","Error")</script>
                             @endif                              
                        </div>
                    </div>
                    <div class="answers_contianer">
                        @foreach($answers as $data)
                        <div class="form-group" id="{{$data->id}}">
                            <input type="hidden" name='id[]' value="{{$data->id}}">
                            <label  class="col-lg-2 control-label">Answer</label>
                                <div class="col-lg-5">
                                    <input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Enter Answer" name='answers[]' type="text" value="@if(isset($data->answer)){{$data->answer}}@endif ">                            
                                </div>                            
                                <div class="col-lg-3">
                                    <input class="form-control" maxlength="191" min="0" max="100" required="required" autofocus="autofocus" placeholder="Enter Weight Percentage" name='weights[]' type="number" value="@if(isset($data->weight)){{(int)$data->weight}}@endif">
                                </div>                            
                                <div class="col-lg-2">
                                    <a class="btn btn-danger btn-md delete_btn_db" data-id="{{$data->id}}">Delete</a>  
                                </div>
                        </div> 
                        @endforeach
                        </div>
                        <div class="form-group">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <a class="btn btn-warning btn-md add_ans">Add Answer</a>                         
                            </div>                         
                        </div>
                        </div>                                            
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    <a href="{{url('admin/questions')}}"  class="btn btn-default">Cancel</a>
                    <input class="btn btn-success btn-md" type="submit" value="Save">                        
                    </div>
                </div>                 
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}
<script >
    $('.add_ans').on('click',function (argument) {
        $('.answers_contianer').append('<div class="form-group"><label  class="col-lg-2 control-label">Answer</label><div class="col-lg-5"><input class="form-control" maxlength="191" required="required" autofocus="autofocus" placeholder="Enter Answer" name="answers[]" type="text"></div><div class="col-lg-3"><input class="form-control" maxlength="191" min="0" max="100" required="required" autofocus="autofocus" placeholder="Enter Weight Percentage" name="weights[]" type="number"></div><div class="col-lg-2"><a class="btn btn-danger btn-md delete_btn">Delete</a> </div></div> ');       
    });    

    $('.answers_contianer').delegate('.delete_btn','click',function (argument) {
        
        $(this).closest('.form-group').remove();       
    });
 $(".delete_btn_db").on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url="{{ url('admin/answers') }}";
     url=url+"/"+id;
     console.log(url);
     var token = $('input[name=_token]').val();
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            
            $.ajax({

                type: "DELETE",
                 headers: {'X-CSRF-TOKEN': token},
                 data:{id:id}, 
                url: url,
                success: function (data) {
                  if (data.response=="ok") {
             console.log(data);
            $('#'+data.id).remove();
            toastr.success('Answer Deleted Succesfully' , 'Deleted');

          }
                    }         
            });
    });
});    
</script>

@endsection