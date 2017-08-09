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
@if ($errors->has('logo'))
    <script> toastr.error("The logo is required. e.g(.jpg, .jpeg ,.png)","Error")</script>
 @endif
            <section>
                <div id="profile" class="schoolTopBn">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">
                            <div class="school-heading">
                                <h1>
                                    School detail
                                </h1>
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div id="teacher-detail" class="teacherContent">
                    <div class="container teacherCon">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                @if($school->logo)
                                        <img src="{{asset('uploads/schoollogo')}}/{{$school->logo}}" alt="School logo" class="schoolImg">
                                @else
                                <img src="{{asset('assets/user/images/s-avatar.png')}}" alt="School logo" class="schoolImg">
                                @endif   
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 teacherHistory schoolHistory">
                                <h3>@if($school->name){{$school->name}}@else Not Available @endif</h3>
                                <p class="school-address"><span>address:</span>@if($school->address){{$school->address}}@else Not Available @endif </p>
                                <p><span>state:</span> @if($school->state){{$school->state}}@else Not Available @endif</p>
                                <p><span>city:</span> @if($school->city){{$school->city}}@else Not Available @endif</p>
                                <p><span>zip:</span> @if($school->zip){{$school->zip}}@else Not Available @endif</p>
                                <p class="teacherHistDetail">
                                    @if($school->about){{$school->about}}@else Not Available @endif
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 teacherNumber">
                                    <p>Teachers</p>
                                    <span>{{count($school->teachers)}}</span>
                                
                                    <button  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn input-button teacherDetailBtn school-detailBtn">
                                        @if(Auth::check())
                                            <a href="{{url('user/addteacher/')}}/{{$school->id}}">Add teacher</a>
                                        @else
                                        <a id="addteacher_id" data-toggle="modal" data-target="#myModal">Add teacher</a>
                                        @endif                                
                                </button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <section>
                <div id="rating-detail" class="ratingContent">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ourTeachers">
                                <h2>Our teachers</h2>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 teacherFolio">
                                    @foreach($school->teachers as $teacher)
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <a href="{{url('teacher-detail')}}/{{$teacher->id}}">      
                                              @if($teacher->image)
                                                <img src="{{asset('uploads/teacher_imgs')}}/{{$teacher->image}}" alt="Teacher image" class="teacherImg">
                                        @else
                                        <img src="{{asset('assets/user/images/dummy.png')}}" alt="Teacher image" class="teacherImg">

                                        @endif 
                                        </a>

                                            <div class="text-carousel textPortfolio">
                                            <h3>@if($teacher->name)<a href="{{url('teacher-detail')}}/{{$teacher->id}}">{{$teacher->name}}</a>@else Not Available @endif</h3>
                                            <p>@if($teacher->address){{$teacher->address}}@else Not Available @endif</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                $(document).ready(function(){
                    $('#addteacher_id').on('click',function (argument) {
                       $('#current_url').val('{{url('/user/addteacher')}}'+'/'+'{{$school->id}}');
                    })
                  
                })

            </script>
@endsection