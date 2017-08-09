
@extends('user.layout')
@section('content')
@if ($errors->has('name'))
    <script> toastr.error("The name field is required","Error")</script>
 @endif  
@if ($errors->has('about'))
    <script> toastr.error("The about field is required","Error")</script>
 @endif  
@if ($errors->has('address'))
    <script> toastr.error("The address field is required","Error")</script>
 @endif  
@if ($errors->has('city'))
    <script> toastr.error("The city field is required","Error")</script>
 @endif  
@if ($errors->has('state'))
    <script> toastr.error("The state field is required","Error")</script>
 @endif  
@if ($errors->has('zip'))
    <script> toastr.error("The zip field is required","Error")</script>
 @endif   
@if ($errors->has('school_id_fk'))
    <script> toastr.error("The School field is required","Error")</script>
 @endif  
@if ($errors->has('image'))
    <script> toastr.error("The logo is required. e.g(.jpg, .jpeg ,.png)","Error")</script>
 @endif


<section>
    <div id="profile" class="teacherDetailBn">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">
                <div class="school-heading">
                    <h1>
                        Teacher detail
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="teacher-detail" class="teacherContent">
        <div class="container teacherCon">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                @if($teacher->image)
                    <img src="{{asset('uploads/teacher_imgs')}}/{{$teacher->image}}" alt="Teacher detail" class="teacherImg">
                    @else
                    <img src="{{asset('assets/user/images/t-avatar.png')}}" alt="Teacher detail" class="teacherImg">
                 @endif   
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 teacherHistory">
                    <h3> @if($teacher->name){{$teacher->name}}@else Not Available @endif</h3>
                    <p><span>Subject:</span> @if($teacher->subject){{$teacher->subject}}@else Not Available @endif </p>
                    <p><span>School:</span> @if($teacher->schools->name){{$teacher->schools->name}}@else Not Available @endif</p>
{{--                     <p><span>City:</span> @if($teacher->city){{$teacher->city}}@else Not Available @endif</p>
                    <p><span>State:</span> @if($teacher->state){{$teacher->state}}@else Not Available @endif</p>
                    <p><span>Teacher website:</span> https://tsbs.crewlogix.com</p> --}}
                  
                        <button type="submit" class=" col-lg-5 col-md-5  col-sm-7 col-xs-12 btn input-button teacherDetailBtn">
                            @if(Auth::check())
                                <a href="{{url('user/teacher-rate')}}/{{$teacher->id}}">Grade the teacher</a>
                            @else
                            <a id="rateteacher" data-toggle="modal" data-target="#myModal">Grade the teacher</a>
                            @endif                             
                        </button>
                 



                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 teacherGrade gradeRating">
                    <p>Students Grading</p>
                    <span>@if(isset($sGrade)){{$sGrade}}@endif</span>
                    <p class="grade">Parents Grading</p>
                    <span>@if(isset($pGrade)){{$pGrade}}@endif</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="rating-detail" class="ratingContent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <ul class="nav nav-pills rating-pills nav-rating">
                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nav-register move-right rating-right <?php if(request('tb')){ if(request('tb')=="student"){?>active<?php } } else{?>active <?php }?>"><a data-toggle="pill" class="rating-pad" href="#studentRat">Student Grading</a></li>
                        </span>
                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nav-register move-left rating-left pull-right <?php  if(request('tb')=="parent"){?>active<?php } ?>"><a data-toggle="pill" class="rating-pad" href="#parentRat">Parent Grading</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="studentRat" class="tab-pane fade  <?php if(request('tb')){ if(request('tb')=="student"){?> in active<?php } } else{?>in active <?php }?>">
                        @foreach($studentRating as $sR)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 studentRatDetail">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                    <span> 
                                    @if($sR->image)
                                        <img src="{{asset('uploads/User')}}/{{$sR->image}}"  class="StudenRatImg">
                                        @else
                                        <img src="{{asset('assets/user/images/t-avatar.png')}}" alt="Teacher detail" class="StudenRatImg">
                                     @endif  

                                    </span>                                                    
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 studentRatContent">
                                    <h4>{{$sR->fName}} {{$sR->lName}}</h4>
                                    <p>Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit. Aenean Commodo Ligula Eget Dolor. Aenean Massa. Cum Sociis Natoque Penatibus Et Magnis Dis Parturient Montes, Nascetur Ridiculus Mus. Donec Quam Felis, Ultricies Nec, Pellentesque Eu, Pretium Quis, Sem. Nulla Consequat Massa Quis Enim. Donec Pede Justo, Fringilla Vel, Aliquet Nec, Vulputate Eget, Arcu.</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 studentRatGrad">
                                    <p>{{$sR->grade}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
            @if($studentRating)            
            @if($studentRating->first())   
            <div id="">
                {{-- {{$teachers->links()}} --}}
                {{$studentRating->appends(array('tb'=> "student"))}}
            </div>
            @endif
            @endif  
           
             </div>
                    <div id="parentRat" class="tab-pane fade <?php  if(request('tb')=="parent"){?>in active<?php } ?> ">
                    @foreach($parentRating as $pR)
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 studentRatDetail">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                <span>
                                    @if($pR->image)
                                        <img src="{{asset('uploads/User')}}/{{$pR->image}}"  class="StudenRatImg">
                                        @else
                                        <img src="{{asset('assets/user/images/t-avatar.png')}}"  class="StudenRatImg">
                                     @endif                                     
                                </span>                                
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 studentRatContent">
                                <h4>{{$pR->fName}} {{$pR->lName}}</h4>
                                <p>Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit. Aenean Commodo Ligula Eget Dolor. Aenean Massa. Cum Sociis Natoque Penatibus Et Magnis Dis Parturient Montes, Nascetur Ridiculus Mus. Donec Quam Felis, Ultricies Nec, Pellentesque Eu, Pretium Quis, Sem. Nulla Consequat Massa Quis Enim. Donec Pede Justo, Fringilla Vel, Aliquet Nec, Vulputate Eget, Arcu.</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 studentRatGrad">
                                <p>{{$pR->grade}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
            @if($parentRating)            
            @if($parentRating->first())   
            <div id="">
                {{-- {{$teachers->links()}} --}}
                {{$parentRating->appends(array('tb'=> "parent"))}}
            </div>
            @endif
            @endif  
                </div>
             </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="ratingModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-login">


        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body rating-body">
                <div class="rating-modal">

                    <h3>Teacher is successfully <br> graded with <br><br><span> 
                        @if(session('data'))
                           {{session('data')[1]}}
                        @endif                        
                    </span></h3>
             </div>
                <div class="modal-footer">
                    <button type="submit" class=" col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 btn regBtn input-button" data-dismiss="modal">THank you</button>
                </div>


            </div>


        </div>
    </div>
</div>
            <script>
                $(document).ready(function(){
                    $('#rateteacher').on('click',function (argument) {
                       $('#current_url').val('{{url('user/teacher-rate')}}'+'/'+'{{$teacher->id}}');
                    });
                @if(session('data'))
                    $('#ratingModal').modal('show');
                    $('#ratingModal').addClass('in');
                    $('#ratingModal').css({"display":"block"});
                @endif

                  
                });

            </script>


@endsection

