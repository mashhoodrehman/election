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


<div class="content-wrapper" style="min-height: 289px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Manage
            <small>Active Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="active">User Manage</li>

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
                <h3 class="box-title">Active Users</h3>
                <div class="box-tools pull-right">
                    <div class="pull-right mb-10 hidden-sm hidden-xs">
                        <a href="{{ url('/admin/addusers') }}" class="btn btn-primary btn-xs">Add Users</a>
                    </div>
                    <!--pull right-->
                    <div class="pull-right mb-10 hidden-lg hidden-md">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Users <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/access/user') }}">All Users</a></li>
                                <li><a href="{{ url('/admin/access/user/create') }}">Create User</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/admin/access/user/deactivated') }}">Deactivated Users</a></li>
                                <li><a href="{{ url('/admin/access/user/deleted') }}">Deleted Users</a></li>
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
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending">First Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending">Last Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                    <th class="sorting" tabindex="0" aria-controls="users-table" rowspan="1" colspan="1" aria-label="Confirmed: activate to sort column ascending">Confirmed</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Roles">Roles</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;?>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @foreach($user as $u)
                                <tr role="row" class="odd" id="{{$u->id}}">

                                    <td class="sorting_1">{{$no++}}</td>
                                    <td>{{$u->fName}}</td>
                                    <td>{{$u->lName}}</td>
                                    <td>{{$u->email}}</td>
                                    <?php if($u->verified=="1"){?>
                                   <td><a href="" data-toggle="tooltip" data-placement="top" title="Un-confirm" name="confirm_item"><label class="label label-success" style="cursor:pointer">Yes</label></a></td>
                                    <?php } else {?>
                                   <td><a href="" data-toggle="tooltip" data-placement="top" title="Un-confirm" name="confirm_item"><label class="label label-success" style="cursor:pointer">No</label></a></td>
                                    <?php }?>
                                    <td>{{$u->role}}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/user/' . $u->id ) }}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i></a> 
                                        <a href="{{ URL::to('admin/user/' . $u->id . '/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                        </a> 
                                        <a href="#" class="button btn btn-xs btn-danger" data-id="{{$u->id}}">
                                            <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                            
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{ $user->links() }}

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

<script>
 $(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url="{{ url('admin/user') }}";
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
            console.log("Hello");
            $.ajax({

                type: "DELETE",
                 headers: {'X-CSRF-TOKEN': token},
                 data:{id:id}, 
                url: url,
                success: function (data) {
                  if (data.response=="ok") {
             console.log(data);
            $('#'+data.id).remove();
            toastr.success('User Deleted Succesfully' , 'Delete');

          }
                    }         
            });
    });
});
</script>

@endsection