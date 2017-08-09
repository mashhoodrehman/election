
@extends('user.layout')
@section('content')
<section>
    <div id="profile" class="searchResultbn">
        <div class="container">
        </div>
    </div>
</section>
<section>
    <div class="search-result">
    <div class="container search-container search-bar resultSearch">
        <form method="GET" action="{{url('/search')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-12 colmd-12 col-sm-12 col-xs-12">
                        <div class="input-group search-input">
                            <input type="text" name="keyword" class="form-control resultField input-control" placeholder="SEARCH SCHOOL OR TEACHER ..." value="{{ strtolower(request('keyword'))}}  ">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 result-align">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="state-dropdown" id="states">
                                    <option></option>
                                    @foreach ($states as $key => $value)
                                    <option value="{{$key}}" {{ strtolower(request('state'))==  strtolower($value)?'selected':''}}  >{{$value}} </option>
                                    @endforeach                                 
                                </select>
                                <input type="hidden" class="btn-select-input " id="state_id" name="state" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="state-dropdown2" id="cities">
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="btn-select-input " id="city" name="city"  />
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group profile-input school-descript col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="number" class="form-control resultField input-control" placeholder="ZIP" name="zip"  
                                value="{{(request('zip'))}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <button class="btn input-button col-xs-12" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 advancedResult">
                        <a>Advanced search</a>
                    </div>
                </div>
            </div>
    </div>
    </form>
</section>
<section>
    <div id="rating-detail" class="ratingContent">
        <div class="container">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <ul class="nav nav-pills rating-pills nav-rating resultNav">
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nav-register move-right resultRight rating-right <?php if(request('tb')){ if(request('tb')=="school"){?>active<?php } } else{?> active <?php }?>"><a data-toggle="pill" class="rating-pad" id="school_tab" href="#studentRat">Schools</a>
                    </li>
                    </span>
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nav-register move-left resultLeft rating-left pull-right <?php  if(request('tb')=="teacher"){?>active<?php } ?> ">
                        <a data-toggle="pill" id="teacher_tab" class="rating-pad" href="#parentRat">Teachers</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="studentRat" class="tab-pane fade  <?php if(request('tb')){ if(request('tb')=="school"){?>in active<?php } } else{?> in active <?php }?>">
                        @if(isset($schools))
                        @if(!empty($schools->first()))
                        @foreach($schools as $school)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 resultRatDetail">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                @if($school->logo)
                                <span> <img src="{{asset('uploads/schoollogo')}}/{{$school->logo}}" class="searchResultImg"></span>             
                                @else
                                <span> <img src="{{asset('assets/user/images/s-avatar.png')}}" class="searchResultImg"></span>
                                @endif
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 studentRatContent resultHistory">
                                <h4><a href="{{url('school-detail')}}/{{$school->id}}">{{$school->name}}</a></h4>
                                <p><span>address:</span> {{$school->address}}</p>
                                <p><span>Phone:</span> +1 907-742-6200</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 teacherNumber searchNumber">
                                <p>Teachers</p>
                                <span>{{ $school->teachers()->count() }}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endif
                        @if($schools->first())
                        <div id="">
                            {{-- {{$schools->links()}} --}}
                            {{$schools->appends(array('tb'=> "school"))}}
                        </div>
                        @endif
                </div>
                    <div id="parentRat" class="tab-pane fade <?php  if(request('tb')=="teacher"){?>in active<?php } ?> ">
                        @if(!empty($teachers->first()))
                        @foreach($teachers as $teacher) 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 resultRatDetail">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                @if($teacher->image)
                                <span> <img src="{{asset('uploads/teacher_imgs')}}/{{$teacher->image}}" class="searchResultImg"></span>             
                                @else
                                <span> <img src="{{asset('assets/user/images/t-avatar.png')}}" class="searchResultImg"></span>
                                @endif
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 studentRatContent resultHistory">
                                <h4><a href="{{url('teacher-detail')}}/{{$teacher->id}}">{{$teacher->name}}</a></h4>
                                <p><span>address:</span> {{$teacher->name}}</p>
                                <p><span>subject:</span>{{$teacher->subject}}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 teacherNumber searchNumber">
                                {{-- <p>Teachers</p>
                                <span></span> --}}
                            </div>
                        </div>



                        @endforeach
                        @endif
                        @if($teachers->first())   
                        <div id="">
                            {{-- {{$teachers->links()}} --}}
                            {{$teachers->appends(array('tb'=> "teacher"))}}
                        </div>
                        @endif                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                    <a class="page-link bg-disabled" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link numberDisabled" href="#">1</a></li>
                    <li class="page-item"><a class="page-link numberDisabled" href="#">2</a></li>
                    <li class="page-item"><a class="page-link numberDisabled" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link bg-disabled " href="#">Next</a>
                    </li>
                    </ul>
                    </nav> -->
            </div>

        </div>
    </div>
</section>





{{-- By Mashhood --}}
<script>

    
</script>
@endsection
