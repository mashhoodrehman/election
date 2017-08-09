@extends('Admin.layout')
@section('content')


<div class="content-wrapper" style="min-height: 289px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            candidate Manage
            <small>Active candidates</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="active">candidates Manage</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="loader" style="display: none;">
            <div class="ajax-spinner ajax-skeleton"></div>
        </div>
        <!--loader-->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Active candidates</h3>
                <div class="box-tools pull-right">
                    <div class="pull-right mb-10 hidden-sm hidden-xs">
                        <a href="{{ url('/admin/addcandidate') }}" class="btn btn-primary btn-xs">Add candidates</a>
<!--                         <a href="admin/access/user/create" class="btn btn-success btn-xs">Create candidate</a>
                        <a href="admin/access/user/deactivated" class="btn btn-warning btn-xs">Deactivated candidate</a>
                        <a href="admin/access/user/deleted" class="btn btn-danger btn-xs">Deleted candidates</a> -->
                    </div>
                    <!--pull right-->
                    <div class="pull-right mb-10 hidden-lg hidden-md">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            candidates <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/access/user') }}">All candidates</a></li>
                                <li><a href="{{ url('/admin/access/user/create') }}">Create candidate</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/admin/access/user/deactivated') }}">Deactivated candidates</a></li>
                                <li><a href="{{ url('/admin/access/user/deleted') }}">Deleted candidates</a></li>
                            </ul>
                        </div>
                        <!--btn group-->
                    </div>
                    <!--pull right-->
                    <div class="clearfix"></div>
                </div>
                <!--box-tools pull-right-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="users-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<!--                         <div class="dataTables_length" id="users-table_length">
                            <label>
                                Show 
                                <select name="users-table_length" aria-controls="users-table" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div> -->
<!--                         <div id="users-table_filter" class="dataTables_filter">
                          <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="users-table"><button class="btn btn-search btn-sm" type="button" title="Clear">x</button>
                          </label>
                        </div> -->
                        <table id="users-table" class="table table-condensed table-hover dataTable no-footer" role="grid" aria-describedby="users-table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Last Name: activate to sort column descending">Id</th>
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending">Address</th>
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Confirmed: activate to sort column ascending">City</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Roles">State</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Roles">Zip</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <!--  @if(isset($result)) -->
                                @foreach($result as $data)
                                <tr role="row" class="odd" id="{{$data->id}}">
                                    <td class="sorting_1">{{$data->id}}</td>
                                     <td>{{$data->fName}} {{$data->lName}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>{{$data->city}}</td>
                                    <td> {{$data->state}}</td>
                                    <td>{{$data->zip}}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/candidates/' .$data->id ) }}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a> 
                                        <a href="{{url('admin/candidates/edit')}}/{{$data->id}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                        </a> 
                                        <a  class="btn btn-xs btn-danger delete_btn" data-id="{{$data->id}}">
                                            <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                 @endforeach
                           <!--  @endif   -->   
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="users-table_info" role="status" aria-live="polite"><!-- Showing 1 to 3 of 3 entries --></div>
                         {{ $result->links() }}
                    </div>
                </div>
                <!--table-responsive-->
            </div>
            <!-- /.box-body -->
        </div>
        <!--box-->
       
        <!--box box-success-->
    </section>
    <!-- /.content -->
</div>
{!! Toastr::render() !!}

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
    </div>
    <div class="modal-footer ">
        <button type="button" class="btn btn-success confirm_btn" data-dismiss="modal" >
        <span class="glyphicon glyphicon-ok-sign "></span> Yes
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span> No
        </button>
    </div>
</div>
</div>
</div>
<!-- /.modal-content --> 

<script>
 var record_id;


/*
$('.delete_btn').on('click',function (argument) {

    var id=$(this).closest('tr').attr('id');
    record_id=id ;
});

$('.confirm_btn').on('click',function (argument) {
     var url="{{ url('schools') }}";
     url=url+"/"+record_id;
    console.log(url);
 var token = $('input[name=_token]').val();
       $.ajax({
        type:"DELETE",
        url:url,
        headers: {'X-CSRF-TOKEN': token},
        data:{id:record_id}, 
        success: function(data){
          if (data.response=="ok") {
             console.log(data.id);
            $('#'+data.id).remove();
          }
           
        },
        error: function(data){

        }
    });
});*/



$('.delete_btn').on('click',function () {
    var id = $(this).data('id');
    var url="{{ url('admin/candidates') }}";
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
                     console.log(data.id);
                    $('#'+data.id).remove();
                        toastr.info('candidate Deleted Succesfully',"Deleted");
                  }
                    }         
            });
    });
});   
</script>
@endsection