@extends('user.layout')
@section('content')




<div class="content">
    <section>

        <div id="profile" class="teacherRatingBn">
            <div class="container">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatarHead">
                <div class="school-heading">
                   <h1>
                            teacher Grading
                    </h1>
                    <p>
                        Please provide rating for your teacher
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
<p class="teacherHistDetail TeacherRatingText">
   @if($teacher->about){{$teacher->about}}@else Not Available @endif
</p>

 

</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 teacherGrade gradeRating">
<p>Students rating</p>
<span>@if(isset($sGrade)){{$sGrade}}@endif</span>

<p class="grade">Parents rating</p>
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
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 qHeading">

           <h3><span>Teacher rating Questionnaire</span></h3>
           </div>
           </div>

            <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 questionareList">


<form action="{{url('user/teacherRateSub')}}" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
<input type="hidden" name="t_id" value="{{$teacher->id}}">
<input type="hidden" name="u_id" value="{{Auth::id()}}">

@foreach($questions as $question)
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 questionareCheck">

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 queNumber">

                                    <p>{{++$loop->index}}</p>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 teacherQuestionare">
                                    <h4>Q: {{$question->question}}</h4>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                         @foreach($question->answers as $answer)
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 radioCheck">
                                            <div>
                                                <input id="checkNo" type="radio" value="{{$answer->weight}}" class='{roles: true}' name="ans[{{$question->id}}]" required>
                                                <label for="option"><span></span> {{$answer->answer}} </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
@endforeach

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 school-button-adjust QuestionareBtn">

                        <button type="submit" class=" col-lg-offset-5 col-lg-2 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 btn input-button btn-lg" >Submit</button>

                    </div>
            {{-- data-toggle="modal" data-target="#ratingModal" --}}
 </form>

           </div>
           </div>
          
           </div>
           </div>

</section>

        </div>



<script>
  
</script>
@endsection